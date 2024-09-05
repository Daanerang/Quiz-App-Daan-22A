<!DOCTYPE html>
<html>

<head>
    <title>Upload Vragen</title>
</head>

<body>
    <h1>Upload Vragenbestand (JSON of CSV)</h1>
    <form action="{{ route('upload.questions') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Kies bestand:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Upload</button>
    </form>
</body>

</html>
