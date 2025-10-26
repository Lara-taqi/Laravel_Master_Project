import './bootstrap';
import 'bootstrap';
import '../css/app.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
$('.navTrigger').click(function () {
    $(this).toggleClass('active');
    console.log("Clicked menu");
    $("#mainListDiv").toggleClass("show_list");
    $("#mainListDiv").fadeIn();

});
window.addEventListener('scroll', function() {
    const nav = document.querySelector('.nav');
       if (window.scrollY > 50) {
            nav.classList.add('glass-nav');
        } else {
            nav.classList.remove('glass-nav');
        }
});


const text = "We're Here To Help You Find The Best Deal!";
        const speed = 100; 
        let i = 0;

        function typeWriter() {
            if (i < text.length) {
                document.getElementById("text").innerHTML += text.charAt(i);
                i++;
                setTimeout(typeWriter, speed);
            }
        }

        window.onload = typeWriter;

document.addEventListener("DOMContentLoaded", function () {
    const cardContainer = document.getElementById('cardContainer');
    const leftBtn = document.querySelector('.scroll-btn.left');
    const rightBtn = document.querySelector('.scroll-btn.right');

    if (cardContainer && leftBtn && rightBtn) {
        leftBtn.addEventListener('click', () => {
            cardContainer.scrollBy({
                left: -300,
                behavior: 'smooth'
            });
        });

        rightBtn.addEventListener('click', () => {
            cardContainer.scrollBy({
                left: 300,
                behavior: 'smooth'
            });
        });
    } else {
        console.warn("Scroll buttons or container not found.");
    }
});
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.hotel-card-img').forEach(img => {
            img.addEventListener('click', function () {
                const hotelId = this.dataset.hotelid;
                
                alert('Gallery for hotel ID: ' + hotelId);
            });
        });
    });


function showLoginAlert() {
    Swal.fire({
        icon: 'warning',
        title: 'Login Required',
        text: 'Please log in to book a room.',
        confirmButtonText: 'Go to Login',
        confirmButtonColor: '#3085d6',
    }).then(result => {
        if (result.isConfirmed) {
            window.location.href = "{{ route('login') }}";
        }
    });
}
document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('form[id^="bookingForm"]').forEach(form => {
    const startDateInput = form.querySelector('.start-date');
    const endDateInput = form.querySelector('.end-date');
    const roomTypeSelect = form.querySelector('.room-type');
    const guestsInput = form.querySelector('.guests-count');
    const totalInput = form.querySelector('.total-price');

    function calculateTotal() {
      const startDateVal = startDateInput.value;
      const endDateVal = endDateInput.value;
      const guestsVal = parseInt(guestsInput.value) || 1;

      if (!startDateVal || !endDateVal) {
        totalInput.value = 'Select dates';
        return;
      }

      const startDate = new Date(startDateVal);
      const endDate = new Date(endDateVal);
      const nights = (endDate - startDate) / (1000 * 60 * 60 * 24);

      if (nights <= 0) {
        totalInput.value = 'Check-out must be after check-in';
        return;
      }

      const selectedOption = roomTypeSelect.options[roomTypeSelect.selectedIndex];
      const roomPrice = selectedOption ? parseFloat(selectedOption.dataset.price) : 0;

      if (!roomPrice) {
        totalInput.value = 'Select a room';
        return;
      }

      const total = nights * roomPrice ;
      totalInput.value = total.toFixed(2) + ' $';
    }

    [startDateInput, endDateInput, roomTypeSelect, guestsInput].forEach(el => {
      el.addEventListener('input', calculateTotal);
      el.addEventListener('change', calculateTotal);
    });


    calculateTotal();
  });
});
