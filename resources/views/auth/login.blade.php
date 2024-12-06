<link rel="stylesheet" href="css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Fonts -->
<section class="container-fluid section1">
    <div class="container_login">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <p class="topTitle">Bozorchi</p>
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
    </div>
    <audio id="audios" controls="true" autoplay="autoplay" class="audio" style="display:none;"></audio>
</section>
<script src="js/script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
