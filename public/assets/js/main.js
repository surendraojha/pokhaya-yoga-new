$(document).ready(function() {
    if($(window).width() <= 831) {
        $(".nav-link.dropdown-toggle").removeAttr("data-bs-hover");
        $(".nav-link.dropdown-toggle").attr("data-bs-toggle", "dropdown");
    }
});

$(window).scroll(function() {    
var scroll = $(window).scrollTop();

if (scroll >= 200) {
    $(".menu-section").addClass("fixed-top");
} else {
    $(".menu-section").removeClass("fixed-top");
}
});




//TESTIMONIAL

$(function() {
  // Owl Carousel
  var owl = $(".owl-one");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:1
          },

          1024:{
              items:1
          },

          1025:{
              items:1
          }
      }      
  });
});


//partner

$(function() {
  // Owl Carousel
  var owl = $(".owl-two");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:5000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:2
          },
  
          769:{
              items:1
          },

          1024:{
              items:2
          },

          1025:{
              items:2
          }
      }      
  });
});

//STUDENT

$(function() {
  // Owl Carousel
  var owl = $(".owl-three");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:2
          },
  
          769:{
              items:1
          },

          1024:{
              items:2
          },

          1025:{
              items:2
          }
      }      
  });
});

//QUOTE

$(function() {
  // Owl Carousel
  var owl = $(".owl-four");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:1
          },

          1024:{
              items:1
          },

          1025:{
              items:1
          }
      }      
  });
});

//ROOM
$(function() {
  // Owl Carousel
  var owl = $(".owl-five");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:2
          },

          1024:{
              items:2
          },

          1025:{
              items:2
          }
      }      
  });
});

$(function() {
  // Owl Carousel
  var owl = $(".owl-six");
  owl.owlCarousel({
    items: 1,
    margin: 30,
    loop: true,
    nav: true,    
    dots: true, 
    autoplay:true,
    autoplayTimeout:3000,
    responsive:{
          0:{
              items:1
          },

          575:{
              items:1
          },
  
          600:{
              items:2
          },

          1024:{
              items:2
          },

          1025:{
              items:2
          }
      }      
  });
});


//BACK TO TOP
      $(document).ready(function(){

$(function(){
 
    $(document).on( 'scroll', function(){
 
      if ($(window).scrollTop() > 100) {
      $('.scroll-top-wrapper').addClass('show');
    } else {
      $('.scroll-top-wrapper').removeClass('show');
    }
  });
 
  $('.scroll-top-wrapper').on('click', scrollToTop);
});
 
function scrollToTop() {
  verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
  element = $('body');
  offset = element.offset();
  offsetTop = offset.top;
  $('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});

//COUNTER

      let count = document.querySelectorAll(".count")
let arr = Array.from(count)



arr.map(function(item){
  let startnumber = 0

  function counterup(){
  startnumber++
  item.innerHTML= startnumber
   
  if(startnumber == item.dataset.number){
      clearInterval(stop)
  }
}

let stop =setInterval(function(){
  counterup()
},50)

})

//PRICING

const cards = document.querySelectorAll(".pricing-card");
cards.forEach((item) => {
  item.addEventListener("mouseover", () => {
    cards.forEach((el) => el.classList.remove("active"));
    item.classList.add("active");
  });
});


//FAQS
$(".set > a").on("click", function() {
  if ($(this).hasClass("active")) {
    $(this).removeClass("active");
    $(this)
      .siblings(".set .content")
      .slideUp(200);
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
  } else {
    $(".set > a i")
      .removeClass("fa-minus")
      .addClass("fa-plus");
    $(this)
      .find("i")
      .removeClass("fa-plus")
      .addClass("fa-minus");
    $(".set > a").removeClass("active");
    $(this).addClass("active");
    $(".set .content").slideUp(200);
    $(this)
      .siblings(".set .content")
      .slideDown(200);
  }
});

//TRANING TABS

  $(function(){

    $.each($(".print-tab .print-tab-menu > li"), function(index, value){
      var menu = $(value).data('tab-menu');
      var tabID = $(value).parent().parent().data('tab-id');
      var hash = window.location.hash.split("#").join('');
      
      if(hash.length > 0){
          
        if(menu == hash){
          $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-menu > li[data-tab-menu="' + menu + '"]').addClass('active');
          $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-content > div[data-tab-content="' + menu + '"]').addClass('view');
        }
        
      }else{
        $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-menu > li:eq(0)').addClass('active');
        $('.print-tab[data-tab-id="' + tabID + '"] .print-tab-content > div:eq(0)').addClass('view');
      }
    });
    


    $(".print-tab .print-tab-menu > li").click(function(event){
      var $this = $(this),
        $data = $this.data('tab-menu'),
        $tabID = $this.parent().parent().data('tab-id');
      if(!$(this).hasClass("active")){

        window.location.hash = $data;
        
        $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-menu > li').removeClass('active');
        $(this).addClass('active');
        
        $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-content > div.view').removeClass('view');
        $('.print-tab[data-tab-id="' + $tabID + '"] .print-tab-content > div[data-tab-content="' + $data + '"]').addClass('view');
      }
    });
  });

  // CALENDAR

  document.addEventListener('DOMContentLoaded', function() {
            const monthYear = document.getElementById('monthYear');
            const calendarDays = document.getElementById('calendarDays');
            const prevMonthBtn = document.getElementById('prevMonth');
            const nextMonthBtn = document.getElementById('nextMonth');
            const selectedDateDisplay = document.getElementById('selectedDateDisplay');
            const clearSelectionBtn = document.getElementById('clearSelection');
            
            let currentDate = new Date();
            let selectedDate = null;
            
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June',
                'July', 'August', 'September', 'October', 'November', 'December'
            ];
            
            function renderCalendar() {
                const year = currentDate.getFullYear();
                const month = currentDate.getMonth();
                
                monthYear.textContent = `${months[month]} ${year}`;
                
                const firstDay = new Date(year, month, 1).getDay();
                const daysInMonth = new Date(year, month + 1, 0).getDate();
                const daysInPrevMonth = new Date(year, month, 0).getDate();
                
                calendarDays.innerHTML = '';
                
                // Previous month days
                for (let i = firstDay - 1; i >= 0; i--) {
                    const day = document.createElement('div');
                    day.classList.add('day', 'other-month');
                    day.textContent = daysInPrevMonth - i;
                    calendarDays.appendChild(day);
                }
                
                // Current month days
                const today = new Date();
                for (let i = 1; i <= daysInMonth; i++) {
                    const day = document.createElement('div');
                    day.classList.add('day');
                    day.textContent = i;
                    
                    // Check if it's today
                    if (year === today.getFullYear() && 
                        month === today.getMonth() && 
                        i === today.getDate()) {
                        day.classList.add('today');
                    }
                    
                    // Check if it's selected
                    if (selectedDate && 
                        year === selectedDate.getFullYear() && 
                        month === selectedDate.getMonth() && 
                        i === selectedDate.getDate()) {
                        day.classList.add('selected');
                    }
                    
                    // Add click event
                    day.addEventListener('click', function() {
                        // Remove previous selection
                        document.querySelectorAll('.day.selected').forEach(el => {
                            el.classList.remove('selected');
                        });
                        
                        // Add selection to clicked day
                        this.classList.add('selected');
                        
                        // Update selected date
                        selectedDate = new Date(year, month, i);
                        updateSelectedDateDisplay();
                    });
                    
                    calendarDays.appendChild(day);
                }
                
                // Next month days
                const totalCells = calendarDays.children.length;
                const remainingCells = 42 - totalCells; // 6 rows * 7 days = 42
                for (let i = 1; i <= remainingCells; i++) {
                    const day = document.createElement('div');
                    day.classList.add('day', 'other-month');
                    day.textContent = i;
                    calendarDays.appendChild(day);
                }
            }
            
            function updateSelectedDateDisplay() {
                if (selectedDate) {
                    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                    selectedDateDisplay.textContent = `Selected: ${selectedDate.toLocaleDateString('en-US', options)}`;
                } else {
                    selectedDateDisplay.textContent = 'No date selected';
                }
            }
            
            function clearSelection() {
                selectedDate = null;
                document.querySelectorAll('.day.selected').forEach(el => {
                    el.classList.remove('selected');
                });
                updateSelectedDateDisplay();
            }
            
            // Event listeners
            prevMonthBtn.addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });
            
            nextMonthBtn.addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });
            
            clearSelectionBtn.addEventListener('click', clearSelection);
            
            // Initialize calendar
            renderCalendar();
        });

