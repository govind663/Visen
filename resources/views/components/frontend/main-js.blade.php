<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="{{ asset('assets/frontend/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/frontend/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/menu.js') }}"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.0.4/dist/aos.js"></script>
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>

<script>
    /* When the user clicks on the button,
    toggle between hiding and showing the dropdown content */
    function myFunction() {
      document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
      if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          if (openDropdown.classList.contains('show')) {
            openDropdown.classList.remove('show');
          }
        }
      }
    }
</script>

<script>
    // -----Country Code Selection
    $("#mobile_code").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
    // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
</script>

<script>
    // -----Country Code Selection
    $("#mobile_code_one").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
    // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
</script>

<script>
    // -----Country Code Selection
    $("#mobile_code_two").intlTelInput({
    initialCountry: "in",
    separateDialCode: true,
    // utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.4/js/utils.js"
    });
</script>

<script>
    // Function to handle popup display and highlight
      function handlePopup() {
          const popup = document.getElementById('popup');
          popup.classList.add('show', 'highlight');

          // Remove the highlight and hide the popup after 0.5 seconds
          setTimeout(() => {
              popup.classList.remove('highlight');
              setTimeout(() => {
                  popup.classList.remove('show');
              }, 300); // Allow some time for highlight transition
          }, 500); // 0.5 second delay
      }

      // Add event listeners to all checkboxes
      document.querySelectorAll('.togglePopup').forEach(checkbox => {
          checkbox.addEventListener('change', function() {
              if (this.checked) {
                  handlePopup();
              }
          });
      });
</script>
