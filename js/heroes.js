document.addEventListener('DOMContentLoaded', function() {
    // Фильтрация героев
    const filterButtons = document.querySelectorAll('.filter-btn');
    const heroCards = document.querySelectorAll('.hero-card');
    const categoryCards = document.querySelectorAll('.category-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Удаляем активный класс у всех кнопок
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Добавляем активный класс нажатой кнопке
            this.classList.add('active');
            
            const filter = this.getAttribute('data-filter');
            
            // Фильтруем карточки героев
            heroCards.forEach(card => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    card.style.display = 'flex';
                    card.style.animation = 'fadeInUp 0.5s ease-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Поиск героев
    const searchInput = document.getElementById('hero-search');
    const searchButton = document.querySelector('.search-btn');
    
    function performSearch() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        heroCards.forEach(card => {
            const name = card.querySelector('h3').textContent.toLowerCase();
            const description = card.querySelector('.hero-excerpt').textContent.toLowerCase();
            const meta = card.querySelector('.hero-meta').textContent.toLowerCase();
            
            if (name.includes(searchTerm) || 
                description.includes(searchTerm) || 
                meta.includes(searchTerm) ||
                searchTerm === '') {
                card.style.display = 'flex';
                card.style.animation = 'fadeInUp 0.5s ease-out';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Сбрасываем фильтры при поиске
        filterButtons.forEach(btn => {
            if (btn.getAttribute('data-filter') !== 'all') {
                btn.classList.remove('active');
            }
        });
        document.querySelector('[data-filter="all"]').classList.add('active');
    }
    
    searchButton.addEventListener('click', performSearch);
    searchInput.addEventListener('keyup', function(e) {
        if (e.key === 'Enter') {
            performSearch();
        }
    });
    
    // Фильтрация по клику на категории
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Находим соответствующую кнопку фильтра
            filterButtons.forEach(btn => {
                if (btn.getAttribute('data-filter') === category) {
                    btn.click();
                }
            });
            
            // Прокрутка к фильтрам
            document.querySelector('.heroes-filters').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
    
    // Плавная прокрутка для внутренних ссылок
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
    
    // Подсветка активной ссылки в меню
    const currentPage = window.location.pathname;
    const menuLinks = document.querySelectorAll('.menu a');
    
    menuLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage || 
            (currentPage.includes('heroes') && link.textContent.includes('ГЕРОЕВ'))) {
            link.classList.add('active');
        }
    });
    
    // Анимация счетчиков в шапке
    function animateCounter(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            element.textContent = Math.floor(progress * (end - start) + start);
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }
    
    // Запускаем анимацию счетчиков при загрузке страницы
    setTimeout(() => {
        const counters = document.querySelectorAll('.header-stat span');
        counters.forEach(counter => {
            const finalValue = parseInt(counter.textContent);
            counter.textContent = '0';
            animateCounter(counter, 0, finalValue, 2000);
        });
    }, 500);
});