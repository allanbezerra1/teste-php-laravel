<style>
    body {
        background-color: #ffffff;
        font-family: Arial, sans-serif;
        text-align: center;
        padding-top: 50px;
    }

    .logo {
        width: 200px;
        height: 200px;
        margin-bottom: 30px;
    }

    form {
        margin-bottom: 20px;
    }

    input[type="file"] {
        display: block;
        margin: 0 auto 10px;
    }

    button[type="submit"] {
        background-color: #0066cc;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        margin-top: 30px;
    }
</style>

<img src="{{ asset('images/ai-solutions-logo.jpeg') }}" alt="Logo" class="logo">

<form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Import File</button>
</form>

<form action="{{ route('import.processQueue') }}" method="POST">
    @csrf
    <button type="submit">Process Queue</button>
</form>
