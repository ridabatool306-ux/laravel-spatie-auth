<!DOCTYPE html>
<html>
<head>
    <title>Results</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            padding: 20px;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        h2 {
            text-align: center;
        }
        a.button {
            background: #3490dc;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 5px;
        }
        table {
            width: 100%;
            margin-top: 15px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }
        th {
            background: #3490dc;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        .btn-edit {
            background: orange;
            padding: 5px 10px;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-delete {
            background: red;
            padding: 5px 10px;
            color: white;
            border: none;
            border-radius: 5px;
        }
        .message {
            background: #38c172;
            color: white;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Result List</h2>

    <a href="{{ route('results.create') }}" class="button">+ Add Result</a>

    @if(session('success'))
    <div id="successMessage" class="message">
        {{ session('success') }}
    </div>
@endif
    <table>
        <tr>
            <th>Name</th>
            <th>Subject</th>
            <th>Marks</th>
            <th>Grade</th>
            <th>Action</th>
        </tr>

        @foreach($results as $r)
        <tr>
            <td>{{ $r->student_name }}</td>
            <td>{{ $r->subject }}</td>
            <td>{{ $r->marks }}</td>
            <td>{{ $r->grade }}</td>
            <td>
                <a href="{{ route('results.edit', $r->id) }}" class="btn-edit">Edit</a>

                <form action="{{ route('results.destroy', $r->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

</body>
</html>

<script>
    setTimeout(function() {
        let msg = document.getElementById('successMessage');
        if(msg){
            msg.style.display = 'none';
        }
    }, 3000); // 3 seconds
</script>