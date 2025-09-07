function toggleMenu() {
  document.querySelector(".nav-links").classList.toggle("active");
}
// script.js
function toggleMenu(){
  const nav = document.querySelector('.nav-links');
  if(!nav) return;
  nav.style.display = nav.style.display === 'flex' ? 'none' : 'flex';
  nav.style.flexDirection = 'column';
  nav.style.position = 'absolute';
  nav.style.right = '20px';
  nav.style.top = '64px';
  nav.style.background = 'rgba(2,6,23,0.85)';
  nav.style.padding = '12px';
  nav.style.borderRadius = '12px';
  nav.style.gap = '8px';
}

/* Close mobile menu on outside click or on link click (better UX) */
document.addEventListener('click', function(e){
  const nav = document.querySelector('.nav-links');
  const toggle = document.querySelector('.menu-toggle');
  if(!nav) return;
  if(e.target.closest('.menu-toggle')) return;
  if(e.target.closest('.nav-links')) {
    // hide after selecting option on mobile
    if(window.innerWidth <= 720) nav.style.display = 'none';
    return;
  }
  if(window.innerWidth <= 720) nav.style.display = 'none';
});

/* Smooth scroll for internal anchors */
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click', function(e){
    e.preventDefault();
    const id = this.getAttribute('href');
    if(id === '#') return;
    const el = document.querySelector(id);
    if(!el) return;
    el.scrollIntoView({behavior:'smooth', block:'start'});
  })
});
