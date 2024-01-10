@push('style-alt')
    <style>
        #logo {
            text-align: center;
        }

        h2 {
            font-size: 25px;
            margin-top: 20px;
            color: #333333;
            /* Set your default font color for mobile */
            transition: color 0.3s ease;
            /* Add a smooth transition effect */
        }

        @media screen and (min-width: 768px) {
            h2 {
                font-size: 36px;
                margin-top: 25px;
                color: #FFF;
                /* Set your default font color for larger screens */
            }
        }

        header.smaller.scroll-light #logo h2,
        header.smaller.scroll-light #logo h2:after {
            color: #333333;
            /* Set the font color when scrolling */
        }
    </style>
@endpush

@push('script-alt')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var logo = document.getElementById('logo');
            var h2 = document.querySelector('#logo h2');

            function updateFontColor() {
                if (window.innerWidth < 768) {
                    h2.style.color = '#333'; // Set to black for mobile
                } else {
                    h2.style.color = '#FFF'; // Set to white for larger screens
                }
            }

            // Set the initial font color
            updateFontColor();

            // Update font color when the window is resized
            window.addEventListener('resize', updateFontColor);

            // Update font color when scrolling
            window.addEventListener('scroll', function() {
                if (window.scrollY > 0) {
                    h2.style.color = '#333'; // Set to black when scrolling
                } else {
                    updateFontColor(); // Reset to default color when not scrolling
                }
            });
        });
    </script>
@endpush

<div id="logo">
    <a href="/">
        {{-- <img alt="" class="logo" src="{{ asset('frontoffice/assets/images/logomyco-7.png') }}" />
        <img alt="" class="logo-2" src="{{ asset('frontoffice/assets/images/logomyco-7.png') }}" /> --}}
        <h2>MYCO SPACE</h2>
    </a>
</div>