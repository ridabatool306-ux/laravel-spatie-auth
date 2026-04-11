<!DOCTYPE html>
<html>
<head>
    <title>Add Result</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
        }
        .form-box {
            width: 40%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
        }
        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #38c172;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Add Result</h2>

    <form action="{{ route('results.store') }}" method="POST">
        @csrf

        <input type="text" name="student_name" placeholder="Student Name">
        <input type="text" name="subject" placeholder="Subject">
        <input type="number" name="marks" placeholder="Marks">

        <button type="submit">Save</button>
    </form>
</div>

</body>
</html>