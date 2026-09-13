<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $fees = Fee::with('student')
            ->when($search, function ($query, $search) {
                $query->whereHas('student', function ($query) use ($search) {
                    $query->where('student_id', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                })
                ->orWhere('fee_type', 'like', "%{$search}%")
                ->orWhere('academic_year', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('fees.index', compact('fees', 'search'));
    }

    public function create()
    {
        $students = Student::orderBy('name')->get();

        return view('fees.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,id',
            ],

            'academic_year' => [
                'required',
                'string',
                'max:20',
            ],

            'grade' => [
                'required',
                'in:11,12',
            ],

            'fee_type' => [
                'required',
                'in:Admission Fee,Tuition Fee,Examination Fee,Library Fee,Computer Fee,Transportation Fee,Other Fee',
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'paid_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'payment_date' => [
                'nullable',
                'date',
            ],

            'payment_method' => [
                'nullable',
                'in:Cash,Bank,Online,Other',
            ],
        ]);

        $discount = $validated['discount'] ?? 0;
        $paidAmount = $validated['paid_amount'] ?? 0;

        if (($discount + $paidAmount) > $validated['total_amount']) {
            return back()
                ->withInput()
                ->withErrors([
                    'paid_amount' => 'Discount and paid amount cannot be greater than the total amount.',
                ]);
        }

        $remainingAmount = $validated['total_amount']
            - $discount
            - $paidAmount;

        if ($paidAmount == 0) {
            $paymentStatus = 'Pending';
        } elseif ($remainingAmount > 0) {
            $paymentStatus = 'Partial';
        } else {
            $paymentStatus = 'Paid';
        }

        $validated['discount'] = $discount;
        $validated['paid_amount'] = $paidAmount;
        $validated['remaining_amount'] = $remainingAmount;
        $validated['payment_status'] = $paymentStatus;

        Fee::create($validated);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee added successfully.');
    }

    public function show(string $id)
    {
        $fee = Fee::with('student')->findOrFail($id);

        return view('fees.show', compact('fee'));
    }

    public function edit(string $id)
    {
        $fee = Fee::findOrFail($id);

        $students = Student::orderBy('name')->get();

        return view('fees.edit', compact('fee', 'students'));
    }

    public function update(Request $request, string $id)
    {
        $fee = Fee::findOrFail($id);

        $validated = $request->validate([
            'student_id' => [
                'required',
                'exists:students,id',
            ],

            'academic_year' => [
                'required',
                'string',
                'max:20',
            ],

            'grade' => [
                'required',
                'in:11,12',
            ],

            'fee_type' => [
                'required',
                'in:Admission Fee,Tuition Fee,Examination Fee,Library Fee,Computer Fee,Transportation Fee,Other Fee',
            ],

            'total_amount' => [
                'required',
                'numeric',
                'min:0',
            ],

            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'paid_amount' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'payment_date' => [
                'nullable',
                'date',
            ],

            'payment_method' => [
                'nullable',
                'in:Cash,Bank,Online,Other',
            ],
        ]);

        $discount = $validated['discount'] ?? 0;
        $paidAmount = $validated['paid_amount'] ?? 0;

        if (($discount + $paidAmount) > $validated['total_amount']) {
            return back()
                ->withInput()
                ->withErrors([
                    'paid_amount' => 'Discount and paid amount cannot be greater than the total amount.',
                ]);
        }

        $remainingAmount = $validated['total_amount']
            - $discount
            - $paidAmount;

        if ($paidAmount == 0) {
            $paymentStatus = 'Pending';
        } elseif ($remainingAmount > 0) {
            $paymentStatus = 'Partial';
        } else {
            $paymentStatus = 'Paid';
        }

        $validated['discount'] = $discount;
        $validated['paid_amount'] = $paidAmount;
        $validated['remaining_amount'] = $remainingAmount;
        $validated['payment_status'] = $paymentStatus;

        $fee->update($validated);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee updated successfully.');
    }

    public function destroy(string $id)
    {
        $fee = Fee::findOrFail($id);

        $fee->delete();

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee deleted successfully.');
    }
}