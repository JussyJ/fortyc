<html>
<script
  src="https://code.jquery.com/jquery-3.7.0.min.js"
  integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
  crossorigin="anonymous"></script>
    <h1 style="text-align: center">Thank you for registering</h1>
    <br>
    <button id="backto">Back to Homepage</button>

    <script>
        $('#backto').click(function(){
            $(location).prop('href', 'r.php?page=msglist')
        })
    </script>
</html>