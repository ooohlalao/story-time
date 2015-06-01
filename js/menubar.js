(function($) {
    $(function() {
            $(document).ready(function () {
                $('#nav li').click(
                    function () {
                    //show sub menu
                        $('ul', this).slideDown(200);
                    },
                    function () {
                    //hide sub
                        $('ul', this).slideUp(150);
                    }
                );

            }
            );
    });
})(jQuery);