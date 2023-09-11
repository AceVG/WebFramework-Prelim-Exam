<!DOCTYPE html>
<html lang="en">
<head>
    <title>Salary Calculator</title>
</head>
<body>
    <form method="POST" action="{{ route('salary.calculate') }}">
        @csrf
        <label for="ratePerHour">Rate Per Hour: </label>
        <input type="text" name = "ratePerHour" id = "ratePerHour" required>
        <br>
        <label for="totalHoursWorked">Total Number of Hours Worked: </label>
        <input type="text" name = "totalHoursWorked" id = "totalHoursWorked" required>
        <br>
        <label for="employmentStatus">Employment Status(Probatonary/Regular): </label>
        <select name="employmentStatus" id="employmentStatus" requird>
            <option value= 2500 >Probationary</option>
            <option value= 5000 >Regular</option>
        </select>
        <br>

        <button type = "submit">Calculate</button>
    </form>

    @isset($ratePerHour)
        <h2> Salary Details </h2>
        <p> Basic Pay: ${{ number_format($basicPay, 2)}}</p>
        <p> Allowance: ${{ number_format($employmentStatus, 2)}}</p>
        <p> Gross Pay: ${{ number_format($grossPay, 2)}}</p>
        <p> Tax Deduction: ${{ number_format($taxDeduction, 2)}}</p>
        <p> Net Pay: ${{ number_format($netPay, 2)}}</p>
    @endisset

</body>
</html>