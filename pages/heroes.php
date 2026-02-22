<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/css/heroes.css" />
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/footer.css">
<title>Все герои Великой Отечественной войны | Виртуальный музей ГАПОУ КПК</title>
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'; ?>

<section class="heroes-header">
    <div class="container">
        <h1>Герои Великой Отечественной войны</h1>
        <p>Подвиги, которые навсегда останутся в памяти поколений</p>
        <div class="header-stats">
            <div class="header-stat">
                <span>27</span>
                <small>героев в коллекции</small>
            </div>
            <div class="header-stat">
                <span>1941-1945</span>
                <small>годы подвига</small>
            </div>
        </div>
    </div>
</section>

<section class="heroes-filters container">
    <div class="filters-container">
        <div class="filter-group">
            <h3>Фильтровать по:</h3>
            <div class="filter-buttons">
                <button class="filter-btn active" data-filter="all">Все герои</button>
                <button class="filter-btn" data-filter="infantry">Пехота</button>
                <button class="filter-btn" data-filter="aviation">Авиация</button>
                <button class="filter-btn" data-filter="navy">Флот</button>
                <button class="filter-btn" data-filter="partisan">Партизаны</button>
                <button class="filter-btn" data-filter="marshal">Маршалы</button>
            </div>
        </div>
        
        <div class="search-box">
            <input type="text" placeholder="Поиск героя..." id="hero-search">
            <button class="search-btn">🔍</button>
        </div>
    </div>
</section>

<section class="all-heroes container">
    <div class="heroes-grid">
        <!-- Герой 1 -->
        <article class="hero-card" data-category="partisan">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/зоя космодемьянская.png" alt="Зоя Космодемьянская">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1923-1941</div>
            </div>
            <div class="hero-card-content">
                <h3>Зоя Космодемьянская</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Партизанка</span>
                    <span class="hero-age">18 лет</span>
                </div>
                <p class="hero-excerpt">Первая женщина — Герой Советского Союза в годы войны. Казнена фашистами 29 ноября 1941 года.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio1" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 2 -->
        <article class="hero-card" data-category="aviation">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/иван кожедуб.png" alt="Иван Кожедуб">
                <div class="hero-badge triple">3×ГСС</div>
                <div class="hero-years">1920-1991</div>
            </div>
            <div class="hero-card-content">
                <h3>Иван Кожедуб</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Летчик-ас</span>
                    <span class="hero-age">64 победы</span>
                </div>
                <p class="hero-excerpt">Трижды Герой Советского Союза. Самый результативный летчик-истребитель в авиации союзников.</p>
                <div class="hero-awards">
                    <span class="award">3× Герой Советского Союза</span>
                    <span class="award">7 орденов Красного Знамени</span>
                </div>
                <a href="/bio2" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 3 -->
        <article class="hero-card" data-category="aviation">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/михаил девятаев.jpg" alt="Михаил Девятаев">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1917-2002</div>
            </div>
            <div class="hero-card-content">
                <h3>Михаил Девятаев</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Летчик</span>
                    <span class="hero-age">Пленный</span>
                </div>
                <p class="hero-excerpt">Совершил побег из концлагеря на угнанном немецком бомбардировщике вместе с 9 товарищами.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio3" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 4 -->
        <article class="hero-card" data-category="marshal">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/георгий жуков.JPG" alt="Георгий Жуков">
                <div class="hero-badge marshal">Маршал</div>
                <div class="hero-years">1896-1974</div>
            </div>
            <div class="hero-card-content">
                <h3>Георгий Жуков</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Маршал Победы</span>
                    <span class="hero-age">4×ГСС</span>
                </div>
                <p class="hero-excerpt">Четырежды Герой Советского Союза. Принимал капитуляцию Германии и Парад Победы 1945 года.</p>
                <div class="hero-awards">
                    <span class="award">4× Герой Советского Союза</span>
                    <span class="award">6 орденов Ленина</span>
                </div>
                <a href="/bio4" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 5 -->
        <article class="hero-card" data-category="infantry">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Александр Матросов.jpg" alt="Александр Матросов">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1924-1943</div>
            </div>
            <div class="hero-card-content">
                <h3>Александр Матросов</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Стрелок</span>
                    <span class="hero-age">19 лет</span>
                </div>
                <p class="hero-excerpt">Закрыл своим телом амбразуру немецкого дзота, обеспечив успех атаки подразделения.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio5" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 6 -->
        <article class="hero-card" data-category="navy">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Александр Маринеско.jpg" alt="Александр Маринеско">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1913-1963</div>
            </div>
            <div class="hero-card-content">
                <h3>Александр Маринеско</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Подводник</span>
                    <span class="hero-age">Капитан 3 ранга</span>
                </div>
                <p class="hero-excerpt">Потопил немецкий лайнер "Вильгельм Густлофф" — крупнейшую по тоннажу победу советских подводников.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio6" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 7 -->
        <article class="hero-card" data-category="infantry">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Василий Зайцевв.jpg" alt="Василий Зайцев">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1915-1991</div>
            </div>
            <div class="hero-card-content">
                <h3>Василий Зайцев</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Снайпер</span>
                    <span class="hero-age">242 подтвержденных</span>
                </div>
                <p class="hero-excerpt">Легендарный снайпер Сталинградской битвы. Уничтожил 242 солдата и офицера противника.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio7" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 8 -->
        <article class="hero-card" data-category="aviation">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Алексей Маресьевв.jpg" alt="Алексей Маресьев">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1916-2001</div>
            </div>
            <div class="hero-card-content">
                <h3>Алексей Маресьев</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Летчик</span>
                    <span class="hero-age">Без ног</span>
                </div>
                <p class="hero-excerpt">После ампутации обеих ног вернулся в истребительную авиацию и сбил 7 самолетов врага.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio8" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 9 -->
        <article class="hero-card" data-category="partisan">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Вера Волошина.jpg" alt="Вера Волошина">
                <div class="hero-badge">ГСС</div>
                <div class="hero-years">1919-1991</div>
            </div>
            <div class="hero-card-content">
                <h3>Вера Волошина</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Партизанка</span>
                    <span class="hero-age">22 года</span>
                </div>
                <p class="hero-excerpt">Разведчица и партизанка. Казнена фашистами в один день с Зоей Космодемьянской.</p>
                <div class="hero-awards">
                    <span class="award">Герой Советского Союза</span>
                    <span class="award">Орден Ленина</span>
                </div>
                <a href="/bio9" class="btn-small">Читать подробнее →</a>
            </div>
        </article>

        <!-- Герой 10 -->
        <article class="hero-card" data-category="marshal">
            <div class="hero-card-image">
                <img src="/assets/images/heroes/Константин Рокоссовский.jpg" alt="Константин Рокоссовский">
                <div class="hero-badge marshal">Маршал</div>
                <div class="hero-years">1896-1968</div>
            </div>
            <div class="hero-card-content">
                <h3>Константин Рокоссовский</h3>
                <div class="hero-meta">
                    <span class="hero-rank">Маршал</span>
                    <span class="hero-age">2×ГСС</span>
                </div>
                <p class="hero-excerpt">Командовал парадом Победы. Один из самых талантливых полководцев Второй мировой войны.</p>
                <div class="hero-awards">
                    <span class="award">2× Герой Советского Союза</span>
                    <span class="award">7 орденов Ленина</span>
                </div>
                <a href="/bio10" class="btn-small">Читать подробнее →</a>
            </div>
        </article>
    </div>

    <div class="pagination">
        <a href="#" class="page-btn active">1</a>
        <a href="#" class="page-btn">2</a>
        <a href="#" class="page-btn">3</a>
        <span class="page-dots">...</span>
        <a href="#" class="page-btn">→</a>
    </div>
</section>

<section class="heroes-quote container">
    <div class="quote-container">
        <blockquote>
            "Герой — это человек, который в решительный момент делает то, что нужно делать в интересах человеческого общества."
        </blockquote>
        <cite>— Юлиус Фучик</cite>
    </div>
</section>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'; ?>

<script src="/js/heroes.js"></script>
</body>
</html>