<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    // Toggle submenu
    $('.has-submenu').click(function () {
        $(this).next('.submenu').slideToggle();
        const arrow = $(this).find('.arrow');
        arrow.toggleClass('bx-chevron-right bx-chevron-down');
    });

    // Toggle profile dropdown
    $('#profile-pic, #dropdown-arrow').click(function () {
        $('#profile-menu').toggle();
    });

    // Close profile dropdown when clicking outside
    $(document).click(function (e) {
        if (!$(e.target).closest('#profile-pic, #dropdown-arrow, #profile-menu').length) {
            $('#profile-menu').hide();
        }
    });
</script>
