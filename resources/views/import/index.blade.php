<form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import File</button>
</form>

<form action="{{ route('import.processQueue') }}" method="POST">
    @csrf
    <button type="submit">Process Queue</button>
</form>
