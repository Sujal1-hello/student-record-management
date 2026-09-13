const studentSelect = document.getElementById('student_id');

const gradeInput = document.getElementById('grade');
const academicYearInput = document.getElementById('academic_year');

const totalInput = document.getElementById('total_amount');
const discountInput = document.getElementById('discount');
const paidInput = document.getElementById('paid_amount');

const remainingDisplay = document.getElementById('remaining_display');
const remainingInput = document.getElementById('remaining_amount');

const statusDisplay = document.getElementById('status_display');
const statusInput = document.getElementById('payment_status');

const amountError = document.getElementById('amountError');
const saveButton = document.getElementById('saveButton');

const feeForm = document.getElementById('feeForm');


// Student selection
studentSelect.addEventListener('change', function () {

    const selectedOption = this.options[this.selectedIndex];

    const grade = selectedOption.getAttribute('data-grade');
    const academicYear = selectedOption.getAttribute('data-academic-year');

    if (grade) {
        gradeInput.value = grade;
    }

    if (academicYear) {
        academicYearInput.value = academicYear;
    }
});


// Calculate fee
function calculateFee() {

    const total = parseFloat(totalInput.value) || 0;
    const discount = parseFloat(discountInput.value) || 0;
    const paid = parseFloat(paidInput.value) || 0;

    const usedAmount = discount + paid;


    // Invalid amount
    if (usedAmount > total) {

        remainingDisplay.value = 'Rs. 0.00';
        remainingInput.value = '0';

        statusDisplay.textContent = 'Invalid';
        statusDisplay.className =
            'px-3 py-2.5 rounded-lg bg-red-100 text-red-700 text-sm font-semibold text-center';

        statusInput.value = 'Pending';

        amountError.classList.remove('hidden');

        saveButton.disabled = true;

        saveButton.classList.add(
            'opacity-50',
            'cursor-not-allowed'
        );

        return;
    }


    // Valid amount
    amountError.classList.add('hidden');

    saveButton.disabled = false;

    saveButton.classList.remove(
        'opacity-50',
        'cursor-not-allowed'
    );


    const remaining = total - discount - paid;


    remainingDisplay.value =
        'Rs. ' + remaining.toFixed(2);

    remainingInput.value =
        remaining.toFixed(2);


    let status;


    if (paid === 0) {

        status = 'Pending';

        statusDisplay.className =
            'px-3 py-2.5 rounded-lg bg-red-100 text-red-700 text-sm font-semibold text-center';

    } else if (remaining > 0) {

        status = 'Partial';

        statusDisplay.className =
            'px-3 py-2.5 rounded-lg bg-yellow-100 text-yellow-700 text-sm font-semibold text-center';

    } else {

        status = 'Paid';

        statusDisplay.className =
            'px-3 py-2.5 rounded-lg bg-green-100 text-green-700 text-sm font-semibold text-center';
    }


    statusDisplay.textContent = status;

    statusInput.value = status;
}


// Listen for amount changes
totalInput.addEventListener('input', calculateFee);

discountInput.addEventListener('input', calculateFee);

paidInput.addEventListener('input', calculateFee);


// Prevent invalid submission
feeForm.addEventListener('submit', function (event) {

    const total = parseFloat(totalInput.value) || 0;

    const discount = parseFloat(discountInput.value) || 0;

    const paid = parseFloat(paidInput.value) || 0;


    if ((discount + paid) > total) {

        event.preventDefault();

        amountError.classList.remove('hidden');

    }

});


// Run when page loads
calculateFee();