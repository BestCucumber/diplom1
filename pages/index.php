<?php
session_start();

?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/css/main.css" />
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/footer.css">

<title>Виртуальный музей ГАПОУ КПК</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

<section id="hero" class="hero-section">
    <div class="hero-content">
        <h1>Я помню, Я горжусь</h1>
        <p>Виртуальный музей ГАПОУ "Камышинский Политехнический Колледж"</p>
        <a href="/#ex" class="btn">Исследовать экспозиции</a>
        
        <div class="hero-stats">
            <div class="stat">
                <div class="stat-number">1418</div>
                <div class="stat-text">дней и ночей войны</div>
            </div>
            <div class="stat">
                <div class="stat-number">27</div>
                <div class="stat-text">миллионов жизней</div>
            </div>
            <div class="stat">
                <div class="stat-number">1710</div>
                <div class="stat-text">разрушенных городов</div>
            </div>
        </div>
    </div>
</section>

<section id="welcome" class="welcome-section container">
    <h2>Добро пожаловать в наш музей</h2>
    <p>Этот виртуальный музей создан, чтобы сохранить память о подвиге советского народа в Великой Отечественной Войне. Здесь собраны истории, документы и свидетельства тех трагических и героических лет.</p>
    
    <div class="victory-timer">
        <h3>🎗До Дня Победы осталось:</h3>
        <div class="timer">
            <div class="time-unit">
                <span id="days">00</span>
                <div class="unit">дней</div>
            </div>
            <div class="time-unit">
                <span id="hours">00</span>
                <div class="unit">часов</div>
            </div>
            <div class="time-unit">
                <span id="minutes">00</span>
                <div class="unit">минут</div>
            </div>
        </div>
    </div>
    
    <div class="quotes-slider">
        <div class="quote active">
            <p>"Никто не забыт, ничто не забыто"</p>
            <div class="author">— Ольга Берггольц</div>
        </div>
        <div class="quote">
            <p>"Тяжело в учении — легко в бою"</p>
            <div class="author">— А.В. Суворов</div>
        </div>
        <div class="quote">
            <p>"Победа будет за нами!"</p>
            <div class="author">— В.М. Молотов, 22 июня 1941</div>
        </div>
    </div>
</section>

<section id="ex" class="ex-section container">
    <h2>Основные экспозиции</h2>
    <div class="ex-grid">
        <div class="ex-item">
            <img src="/assets/images/1.jpeg" alt="Начало войны" />
            <div class="ex-badge">1941</div>
            <h3>Начало войны</h3>
            <p>22 июня 1941 года. Путь от предвоенного мира к первым дням самого кровопролитного конфликта в истории человечества.</p>
            <a href="/page1" class="btn-small">Перейти в зал</a>
        </div>
        <div class="ex-item">
            <img src="/assets/images/2.jpg" alt="Ключевые битвы" />
            <div class="ex-badge">1941-1945</div>
            <h3>Ключевые битвы</h3>
            <p>От обороны Москвы до штурма Берлина — решающие сражения, изменившие ход Второй мировой войны.</p>
            <a href="/page2" class="btn-small">Перейти в зал</a>
        </div>
        <div class="ex-item">
            <img src="/assets/images/3.jpg" alt="Жизнь в тылу" />
            <div class="ex-badge">Тыл</div>
            <h3>Жизнь в тылу</h3>
            <p>Подвиг тружеников тыла, женщин, детей и стариков, обеспечивающих фронт всем необходимым для Победы.</p>
            <a href="/page3" class="btn-small">Перейти в зал</a>
        </div>
        <div class="ex-item">
            <img src="/assets/images/4.jpg" alt="Оружие победы" />
            <div class="ex-badge">Анализ</div>
            <h3>Причины поражений в начале войны</h3>
            <p>Почему начальный период войны оказался неудачным для СССР. Исторический анализ и документы.</p>
            <a href="/page4" class="btn-small">Перейти в зал</a>
        </div>
    </div>
</section>

<section id="heroes" class="heroes-section container">
    <h2>Истории Героев</h2>
    <p class="section-subtitle">Подвиги, которые навсегда останутся в памяти</p>
    
    <div class="heroes-grid">
        <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/зоя космодемьянская.png" alt="Зоя Космодемьянская" />
                <div class="hero-medal">ГСС</div>
            </div>
            <div class="hero-content">
                <h3>Зоя Космодемьянская</h3>
                <div class="hero-info">Партизанка | 18 лет</div>
                <p>Первая женщина — Герой Советского Союза в годы войны. Казнена фашистами 29 ноября 1941 года.</p>
                <a href="/html/biololo.php?id=1" class="btn-small">Подробнее</a>
            </div>
        </div>
        
        <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/иван кожедуб.png" alt="Иван Кожедуб" />
                <div class="hero-medal triple">3×ГСС</div>
            </div>
            <div class="hero-content">
                <h3>Иван Кожедуб</h3>
                <div class="hero-info">Летчик-ас | 64 победы</div>
                <p>Трижды Герой Советского Союза. Самый результативный летчик-истребитель в авиации союзников.</p>
                <a href="/html/biololo.php?id=2" class="btn-small">Подробнее</a>
            </div>
        </div>
        
        <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/михаил девятаев.jpg" alt="Михаил Девятаев" />
                <div class="hero-medal">ГСС</div>
            </div>
            <div class="hero-content">
                <h3>Михаил Девятаев</h3>
                <div class="hero-info">Летчик | Пленный</div>
                <p>Совершил побег из концлагеря на угнанном немецком бомбардировщике вместе с 9 товарищами.</p>
                <a href="/html/biololo.php?id=2" class="btn-small">Подробнее</a>
            </div>
        </div>
        
        <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/георгий жуков.JPG" alt="Георгий Жуков" />
                <div class="hero-medal">Маршал</div>
            </div>
            <div class="hero-content">
                <h3>Георгий Жуков</h3>
                <div class="hero-info">Маршал Победы | 4×ГСС</div>
                <p>Четырежды Герой Советского Союза. Принимал капитуляцию Германии и Парад Победы 1945 года.</p>
                <a href="/bio4" class="btn-small">Подробнее</a>
            </div>
        </div>

            <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/Вера Волошина.jpg" alt="Георгий Жуков" />
                <div class="hero-medal">ГСС</div>
            </div>
            <div class="hero-content">
                <h3>Вера Волошина</h3>
                <div class="hero-info">Партизанка | 22г года</div>
                <p>Разведчица и партизанка. Казнена фашистами в один день с Зоей Космодемьянской..</p>
                <a href="/bio9" class="btn-small">Подробнее</a>
            </div>
        </div>
                    <div class="hero-card">
            <div class="hero-image">
                <img src="/assets/images/heroes/Александр Маринеско.jpg" alt="Георгий Жуков" />
                <div class="hero-medal">ГСС</div>
            </div>
            <div class="hero-content">
                <h3>Александр Маринеско</h3>
                <div class="hero-info">Подводник | Капитан 3 ранга</div>
                <p>Потопил немецкий лайнер "Вильгельм Густлофф" — крупнейшую по тоннажу победу советских подводников.</p>
                <a href="/bio6" class="btn-small">Подробнее</a>
            </div>
        </div>
    </div>
    
    <div class="all-heroes-link">
        <a href="/heroes" class="btn">Все герои →</a>
    </div>
</section>

<section id="calendar" class="calendar-section container">
    <h2>Календарь памятных дат</h2>
    <div class="calendar-grid">
        <div class="calendar-item important">
            <div class="calendar-date">22 июня</div>
            <div class="calendar-title">День памяти и скорби</div>
            <div class="calendar-desc">Начало Великой Отечественной войны в 1941 году</div>
        </div>
        
        <div class="calendar-item">
            <div class="calendar-date">27 января</div>
            <div class="calendar-title">День снятия блокады</div>
            <div class="calendar-desc">Ленинградской блокады в 1944 году</div>
        </div>
        
        <div class="calendar-item">
            <div class="calendar-date">2 февраля</div>
            <div class="calendar-title">Сталинградская победа</div>
            <div class="calendar-desc">Разгром немецких войск в 1943 году</div>
        </div>
        
        <div class="calendar-item">
            <div class="calendar-date">9 мая</div>
            <div class="calendar-title">День Победы</div>
            <div class="calendar-desc">Окончание Великой Отечественной войны в 1945 году</div>
        </div>
        
        <div class="calendar-item">
            <div class="calendar-date">23 февраля</div>
            <div class="calendar-title">День защитника Отечества</div>
            <div class="calendar-desc">В память о первых победах Красной Армии</div>
        </div>
        
        <div class="calendar-item">
            <div class="calendar-date">3 декабря</div>
            <div class="calendar-title">День Неизвестного Солдата</div>
            <div class="calendar-desc">Память о погибших без вести защитниках</div>
        </div>
    </div>
</section>

<section id="kamyshin" class="kamyshin-section container">
    <h2>Камышин в годы войны</h2>
    <div class="city-history">
        <div class="city-photo">
            <img src="/assets/images/gospital.jpg" alt="Камышин в войну">
            <div class="photo-caption">Камышин, 1942 год. Военный госпиталь</div>
        </div>
        <div class="city-info">
            <h3>Трудовая доблесть нашего города</h3>
            <div class="city-stats">
                <div class="city-stat">
                    <div class="stat-num">2,5 млн</div>
                    <div class="stat-label">рублей собрано на танковую колонну</div>
                </div>
                <div class="city-stat">
                    <div class="stat-num">5</div>
                    <div class="stat-label">эвакогоспиталей работало в городе</div>
                </div>
                <div class="city-stat">
                    <div class="stat-num">15 тыс.</div>
                    <div class="stat-label">камышан ушли на фронт</div>
                </div>
            </div>
        </div>
    </div>
    <p>Война забрала мужчин - пятнадцать тысяч камышан ушли на фронт, и город осиротел. Но Жизнь
        продолжалась: у станков вставли женщины и подростки, сутками ковавшие минометы и снаряды.
        Фронту помогали всем, чем могли.Собирали посылки, несли последние рубли в фонд обороны. 
        Накопили 2,5 миллиона - и на эти деньги построили танковую колонну. С именем родного города
        танки ушли бить врага. В 5 госпиталях, развернутых в школах, спасали раненных. А еще принимали
        эвакуированных детей из блокадного Ленинграда - худых, испуганных, замерзших. Их отогревали, 
        кормили, лечили. Старались вернуть к жизни. Так и жили: работали до изнеможения, помогали чем могли, ждали 
        писем с фронта. Это был негромкий, страшный и великий труд - труд людей в тылу, делавших вс ради Победы. 
    </p>
</section>

<section id="archive" class="archive-section container">
    <h2>Архив: Документы и Фотографии</h2>
    
    <div class="archive-search">
        <input type="text" placeholder="Поиск по документам, фото, датам..." id="search-input">
        <button class="btn-small" id="search-btn">Найти</button>
    </div>
    
    <p>Исследуйте ценные исторические документы, фотографии и кинохронику, чтобы глубже понять события тех лет.</p>
    <a href="/archive" class="btn-archive">Перейти в архив</a>
</section>

<section id="about" class="about-section container">
    <h2>О музее</h2>
    <div class="about-content">
        <div class="about-text">
            <p>Наш виртуальный музей — это дань уважения подвигу советского народа в Великой Отечественной войне. Мы стремимся к тому, чтобы история была доступна и понятна каждому, особенно молодому поколению.</p>
            
            <h3>Наша миссия</h3>
            <ul>
                <li>Сохранение исторической памяти о Великой Отечественной войне</li>
                <li>Патриотическое воспитание молодежи</li>
                <li>Исследование вклада Камышина и камышан в Победу</li>
                <li>Создание цифрового архива для будущих поколений</li>
            </ul>
            
            <h3>Для кого этот музей?</h3>
            <p>Для студентов, школьников, преподавателей, исследователей и всех, кто интересуется историей нашей страны и хочет сохранить память о подвиге предков.</p>
        </div>
        
        <div class="about-stats">
            <div class="about-stat">
                <div class="about-num">2026</div>
                <div class="about-label">год создания</div>
            </div>
            <div class="about-stat">
                <div class="about-num">КПК</div>
                <div class="about-label">организатор</div>
            </div>
            <div class="about-stat">
                <div class="about-num">100%</div>
                <div class="about-label">бесплатный доступ</div>
            </div>
        </div>
    </div>
</section>

<section id="contact" class="contact-section container">
    <h2>Контакты</h2>
    <div class="contact-content">
        <div class="contact-info">
            <h3>Свяжитесь с нами</h3>
            <p>Если у вас есть вопросы, предложения или вы хотите поделиться семейными историями, документами, фотографиями — мы будем рады помочь!</p>
            
            <div class="contact-details">
                <div class="contact-item">
                    <div class="email">
                        <strong>Email:</strong>
                        <a href="mailto:kpk2025vov@email.ru">kpk2025vov@email.ru</a>
                    </div>
                </div>
                
                <div class="contact-item">
                    <div>
                        <strong>Адрес:</strong>
                        <p>ГАПОУ "Камышинский Политехнический Колледж"</p>
                    </div>
                </div>

            </div>
        </div>
        
        <div class="contact-form">
            <h3>Оставить сообщение</h3>
            <form id="contact-form">
                <input type="text" placeholder="Ваше имя" required>
                <input type="email" placeholder="Ваш email" required>
                <textarea placeholder="Ваше сообщение" rows="4" required></textarea>
                <button type="submit" class="btn">Отправить</button>
            </form>
        </div>
    </div>
</section>

<section id="news" class="news-section container">
    <h2>Последние новости</h2>
    <a href="/news" class="all-news-link">Все новости →</a>
    <div class="create-line"></div>
    
    <div class="container-news">
        <div class="new">
            <div class="news-image">
                <img src="/assets/images/news1.jpg" alt="Встреча с ветеранами">
                <div class="news-date">15.04.2025</div>
            </div>
            <h3>Встреча с ветеранами в КПК</h3>
            <p>В колледже прошла торжественная встреча студентов с ветеранами Великой Отечественной войны. Учащиеся подготовили концерт и подарки.</p>
            <a href="#" class="news-link">Читать далее</a>
        </div>
        
        <div class="new">
            <div class="news-image">
                <img src="/assets/images/news2.jpg" alt="Возложение цветов">
                <div class="news-date">09.05.2025</div>
            </div>
            <h3>Возложение цветов к мемориалу</h3>
            <p>Студенты и преподаватели КПК почтили память павших воинов, возложив цветы к Вечному огню и памятникам города.</p>
            <a href="#" class="news-link">Читать далее</a>
        </div>
        
        <div class="new">
            <div class="news-image">
                <img src="/assets/images/news3.jpg" alt="Выставка">
                <div class="news-date">22.06.2025</div>
            </div>
            <h3>Открытие новой экспозиции</h3>
            <p>В виртуальном музее открылась новая экспозиция, посвященная 80-летию полного снятия блокады Ленинграда.</p>
            <a href="#" class="news-link">Читать далее</a>
        </div>
        
        <div class="new">
            <div class="news-image">
                <img src="/assets/images/news4.jpg" alt="Конкурс">
                <div class="news-date">01.03.2026</div>
            </div>
            <h3>Итоги конкурса сочинений</h3>
            <p>Подведены итоги ежегодного конкурса "Письмо солдату". Победители получили грамоты и призы.</p>
            <a href="#" class="news-link">Читать далее</a>
        </div>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>

<script>
document.addEventListener('DOMContentLoaded', function(){
    // Параллакс для hero-секции
    const heroSection = document.querySelector('.hero-section');
    if(heroSection) {
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;
            heroSection.style.backgroundPositionY = `${scrolled * 0.5}px`;
        });
    }

    // Таймер до Дня Победы
    function updateVictoryTimer() {
        const now = new Date();
        const currentYear = now.getFullYear();
        let victoryDate = new Date(currentYear, 4, 9);
        
        if (now > victoryDate) {
            victoryDate = new Date(currentYear + 1, 4, 9);
        }
        
        const diff = victoryDate - now;
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        
        document.getElementById('days').textContent = days.toString().padStart(2, '0');
        document.getElementById('hours').textContent = hours.toString().padStart(2, '0');
        document.getElementById('minutes').textContent = minutes.toString().padStart(2, '0');
    }
    updateVictoryTimer();
    setInterval(updateVictoryTimer, 60000);

    // Карусель цитат
    const quotes = document.querySelectorAll('.quote');
    let currentQuote = 0;
    
    function showNextQuote() {
        quotes.forEach(quote => quote.classList.remove('active'));
        currentQuote = (currentQuote + 1) % quotes.length;
        quotes[currentQuote].classList.add('active');
    }
    
    setInterval(showNextQuote, 5000);

    // Поиск в архиве
    document.getElementById('search-btn').addEventListener('click', function() {
        const query = document.getElementById('search-input').value;
        if(query.trim()) {
            alert(`Поиск по запросу: "${query}"\nВ реальном проекте здесь будет поиск по базе данных архива.`);
        }
    });

    // Форма обратной связи
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();
        alert('Спасибо за ваше сообщение! Мы свяжемся с вами в ближайшее время.');
        this.reset();
    });

    // Плавная прокрутка для меню
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if(targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if(targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
            }
        });
    });
});
</script>
</body>
</html>