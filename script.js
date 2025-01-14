const images = ['assets/img/b1.jpg', 'assets/img/b2.jpg', 'assets/img/b3.jpg', 'assets/img/b4.jpg', 'assets/img/b5.jpg', 'assets/img/b6.jpg', 'assets/img/b7.jpg', 'assets/img/b8.jpg', 'assets/img/b9.jpg', 'assets/img/b10.jpg', 'assets/img/b11.jpg', 'assets/img/b12.jpg'];
let currentIndex = 0;
const bannerImage = document.getElementById('bannerImage');

function changeImage() {
  const nextIndex = (currentIndex + 1) % images.length;
  bannerImage.src = images[nextIndex];
  bannerImage.classList.add('fade-out');
  setTimeout(() => {
    bannerImage.classList.remove('fade-out');
    currentIndex = nextIndex;
  }, 500);
}

// Change image every 5 seconds
setInterval(changeImage, 5000);

const showBtn = document.querySelector('.navBtn');
const topNav = document.querySelector('.top-nav');

showBtn.addEventListener('click', function(){
    if(topNav.classList.contains('showNav')){
        topNav.classList.remove('showNav');
        showBtn.innerHTML = '<i class = "fas fa-bars"></i>';
    } else {
        topNav.classList.add('showNav');
        showBtn.innerHTML = '<i class = "fas fa-times"></i>';
    }
});

// Your existing JavaScript code

document.getElementById('contact-bottom').addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally
  
  // Collect form data
  var formData = new FormData(this);
  
  // Send form data to PHP script using AJAX
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'contact.php', true);
  xhr.onload = function() {
      if (xhr.status === 200) {
          alert(xhr.responseText); // Display the response from PHP script
          document.getElementById('contact-bottom').reset(); // Reset the form after successful submission
      } else {
          alert('Error: ' + xhr.statusText); // Display error message if AJAX request fails
      }
  };
  xhr.send(formData);
});

// Your existing JavaScript code

