<!DOCTYPE html>
<html>
<head>
    <title>Edit Result</title>
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
            background: orange;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="form-box">
    <h2>Edit Result</h2>

    <form action="{{ route('results.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="student_name" value="{{ $result->student_name }}">
        <input type="text" name="subject" value="{{ $result->subject }}">
        <input type="number" name="marks" value="{{ $result->marks }}">

        <button type="submit">Update</button>
    </form>
</div>

</body>
</html>