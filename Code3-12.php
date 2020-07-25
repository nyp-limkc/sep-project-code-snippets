<script src="../js/jquery-3.5.1.min.js"></script>
<script>
    // reload the image upon file selection
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.restaurant_img').attr('src', e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function confirmDelete() {
        var ans = confirm("Are you sure you want to delete?");
        return ans;
    }
</script>