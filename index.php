<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/0b95acf9d7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="img/tab-icon.png">

    <title>Brandon Saravia | Portfolio</title>
</head>

<body>

    <header class="header" id="header">
        <div class="header__container">
            <div class="header__text-box">
                <h1 class="heading-primary">
                    <span class="heading-primary--main">Brandon Saravia</span>
                    <span class="heading-primary--sub">Full Stack Web Developer</span>
                </h1>
            </div>
            <a href="#" class="btn btn--text">View my work<i class="fas fa-arrow-right"></i></a>

        </div>
    </header>

    <!-- needed to run three.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/102/three.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.2/TweenMax.min.js"></script>

    <!-- Header's 3D Background -->
    <script>

        var scene = new THREE.Scene();

        var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        camera.position.z = 5;

        var renderer = new THREE.WebGLRenderer({ antialias: true });
        renderer.setClearColor("#e5e5e5");
        renderer.setSize(window.innerWidth, window.innerHeight);

        document.body.appendChild(renderer.domElement);

        window.addEventListener('resize', () => {
            renderer.setSize(window.innerWidth, window.innerHeight);
            camera.aspect = window.innerWidth / window.innerHeight;

            camera.updateProjectionMatrix();
        })

        var raycaster = new THREE.Raycaster();
        var mouse = new THREE.Vector2();

        var geometry = new THREE.BoxGeometry(1, 1, 1);
        var material = new THREE.MeshLambertMaterial({ color: 0x6F4C4D });

        meshX = -10
        for (let i = 0; i < 15; i++) {
            var mesh = new THREE.Mesh(geometry, material);
            mesh.position.x = (Math.random() - 0.5) * 10;
            mesh.position.y = (Math.random() - 0.5) * 10;
            mesh.position.z = (Math.random() - 0.5) * 10;
            scene.add(mesh);
            meshX += 1
        }

        var light = new THREE.PointLight(0xFFFFFF, 1, 1000);
        light.position.set(0, 0, 0);
        scene.add(light);

        var light = new THREE.PointLight(0xFFFFFF, 2, 1000);
        light.position.set(0, 0, 25);
        scene.add(light);

        var render = function () {
            requestAnimationFrame(render);



            renderer.render(scene, camera);
        }

        function onMouseMove(e) {
            e.preventDefault();

            mouse.x = (e.clientX / window.innerWidth) * 2 - 1;
            mouse.y = - (e.clientY / window.innerHeight) * 2 + 1;

            raycaster.setFromCamera(mouse, camera);

            var intersects = raycaster.intersectObjects(scene.children, true);
            for (let i = 0; i < intersects.length; i++) {
                this.tl = new TimelineMax();
                this.tl.to(intersects[i].object.scale, 1, { x: 2, ease: Expo.easeOut })
                this.tl.to(intersects[i].object.scale, .5, { x: .5, ease: Expo.easeOut })
                this.tl.to(intersects[i].object.position, .5, { x: 2, ease: Expo.easeOut })
                this.tl.to(intersects[i].object.rotation, .5, { y: Math.PI * .5, ease: Expo.easeOut }, "=-1.5")
            }
        }

        render();

        window.addEventListener('mousemove', onMouseMove)

    </script>

    <main>
        <section class="section-about" id="about">
            <div class="u-center-text u-margin-bottom-large">
                <h2 class="heading-secondary u-margin-bottom-medium-small" id="header-animation">
                    About Me
                </h2>
            </div>
            <div class="row u-opacity-0" id='remove-about-section-opacity'>
                <div class="col-1-of-2" id="left-content-animation">
                    <h3 class="heading-tertiary u-margin-bottom-small">Who am I?</h3>
                    <p class="paragraph">
                        I'm a <span class="paragraph--emphisis">Full Stack Web Developer</span> located in <span class="paragraph--emphisis">Greenville, South Carolina</span>.
                        My main goal is to build web applications to be straightforward and enjoyable for best user
                        experience.
                    </p>

                    <h3 class="heading-tertiary u-margin-bottom-small">What are my Front End skills?</h3>
                    <ul class="list">
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'javascript', '#F0DB4F'], ['item', 'html5', '#F16529'], ['item', 'css3', '#2965f1'], ['logo', 'javascript-logo', '#F0DB4F'], ['logo', 'html5-logo', '#F16529'], ['logo', 'css3-logo', '#2965f1']])"  onmouseout="removeHighlight([['item', 'javascript'], ['item', 'html5'], ['item', 'css3'], ['logo', 'javascript-logo'], ['logo', 'html5-logo'], ['logo', 'css3-logo']])">Languages:</span> <span class="list__javascript list__item">Javascript</span> / <span class="list__html5 list__item">Html5</span> / <span class="list__css3 list__item">Css3</span></li>
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'react', '#61dbfb'], ['item', 'react-redux', '#61dbfb'], ['item', 'react-hooks', '#61dbfb'], ['logo', 'react-logo', '#61dbfb']])"  onmouseout="removeHighlight([['item', 'react'], ['item', 'react-redux'], ['item', 'react-hooks'], ['logo', 'react-logo']])">Libraries:</span> <span class="list__react list__item">React</span> / <span class="list__react-redux list__item">React-Redux</span> / <span class="list__react-hooks list__item">React-Hooks</span></li>
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'sass', '#c69'], ['item' ,'less', 'rgb(111, 111, 194)'], ['logo', 'sass-logo', '#c69'], ['logo', 'less-logo', 'rgb(111, 111, 194)']])"  onmouseout="removeHighlight([['item', 'sass'], ['item', 'less'], ['logo', 'sass-logo'], ['logo', 'less-logo']])">CSS Preprocessors:</span> <span class="list__sass list__item">Sass</span> / <span class="list__less list__item">Less</span></li>
                    </ul>
                    
                    <h3 class="heading-tertiary u-margin-bottom-small">What are my Back End skills?</h3>
                    <ul class="list">
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'java', 'orange'], ['item', 'python', '#4B8BBE'], ['logo', 'java-logo', 'orange'], ['logo', 'python-logo', '#4B8BBE']])"  onmouseout="removeHighlight([['item', 'java'], ['item', 'python'], ['logo', 'python-logo'], ['logo', 'java-logo']])">Languages:</span> <span class="list__java list__item">Java</span> / <span class="list__python list__item">Python</span></li>
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'spring-boot', 'orange'], ['item', 'django', '#4B8BBE'], ['logo', 'java-logo', 'orange'], ['logo', 'python-logo', '#4B8BBE']])"  onmouseout="removeHighlight([['item', 'spring-boot'], ['item', 'django'], ['logo', 'python-logo'], ['logo', 'java-logo']])">Frameworks:</span> <span class="list__spring-boot list__item">Spring Boot</span> / <span class="list__django list__item">Django</span></li>
                        <li class="list__row"><span class="list__key" onmouseover="highlight([['item', 'postgressql', 'lightgreen'], ['item', 'mysql', 'lightgreen'], ['item', 'sqlite', 'lightgreen']])"  onmouseout="removeHighlight([['item', 'postgressql'], ['item', 'mysql'], ['item', 'sqlite']])">Databases:</span> <span class="list__postgressql list__item">PostgresSQL</span> / <span class="list__mysql list__item">MySQL</span> / <span class="list__sqlite list__item">SQLite</span></li>
                    </ul>
                </div>
                <div class="col-1-of-2">
                    <img src="https://via.placeholder.com/465x200.jpg?text=My+Photo+placehoalder" alt="photo of Brandon Saravia" class="section-about__my-photo" id="right-top-content-animation">
                    <div class="composition" id="right-bottom-content-animation">
                        <i class="fab fa-js composition__javascript-logo" onmouseover="highlight([['item', 'javascript', '#F0DB4F'], ['logo', 'javascript-logo', '#F0DB4F']])" onmouseout="removeHighlight([['item', 'javascript'], ['logo', 'javascript-logo']])"></i>
                        <i class="fab fa-html5 composition__html5-logo" onmouseover="highlight([['item', 'html5', '#F16529'], ['logo', 'html5-logo', '#F16529']])" onmouseout="removeHighlight([['item', 'html5'], ['logo', 'html5-logo']])"></i>
                        <i class="fab fa-css3-alt composition__css3-logo" onmouseover="highlight([['item', 'css3', '#2965f1'], ['logo', 'css3-logo', '#2965f1']])" onmouseout="removeHighlight([['item', 'css3'], ['logo', 'css3-logo']])"></i>
                        <i class="fab fa-react composition__react-logo" onmouseover="highlight([['item', 'react', '#61dbfb'], ['item', 'react-redux', '#61dbfb'], ['item', 'react-hooks', '#61dbfb'], ['logo', 'react-logo', '#61dbfb']])" onmouseout="removeHighlight([['item', 'react'], ['item', 'react-redux'], ['item', 'react-hooks'], ['logo', 'react-logo']])"></i>></i>
                        <i class="fab fa-sass composition__sass-logo" onmouseover="highlight([['item', 'sass', '#c69'], ['logo', 'sass-logo', '#c69']])" onmouseout="removeHighlight([['item', 'sass'], ['logo', 'sass-logo']])"></i>
                        <i class="fab fa-less composition__less-logo" onmouseover="highlight([['item', 'less', 'rgb(111, 111, 194)'], ['logo', 'less-logo', 'rgb(111, 111, 194)']])" onmouseout="removeHighlight([['item', 'less'], ['logo', 'less-logo']])"></i>
                        <i class="fab fa-java composition__java-logo" onmouseover="highlight([['item', 'java', 'orange'], ['item', 'spring-boot', 'orange'], ['logo', 'java-logo', 'orange']])" onmouseout="removeHighlight([['item', 'java'], ['item', 'spring-boot'], ['logo', 'java-logo']])"></i>
                        <i class="fab fa-python composition__python-logo" onmouseover="highlight([['item', 'python', '#4B8BBE'], ['item', 'django', '#4B8BBE'], ['logo', 'python-logo', '#4B8BBE']])" onmouseout="removeHighlight([['item', 'python'], ['item', 'django'], ['logo', 'python-logo']])"></i>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-projects" id="projects">
            <div class="bg-video">
                <video class="bg-video__content" autoplay muted loop>
                    <source src="img/coverr-typing-in-laptop-1578678668153.mp4" type="video/mp4">
                    <source src="img/coverr-typing-in-laptop-1578678668153.jpg" type="image">
                    Your browser is not supported!
                </video>
            </div>

            <div class="u-center-text u-margin-bottom-large">
                <h2 class="heading-secondary u-margin-bottom-medium-small" id="header-animation">
                    Recent Projects
                </h2>
            </div>

            <!-- <div class="row u-opacity-0" id='remove-projects-section-opacity'> -->
            <div class="row" id='remove-projects-section-opacity'>
                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__picture card__picture--1">
                            &nbsp;
                        </div>
                        <h4 class="card__heading">
                            <span class="card__heading-span">
                                MacBuilt Roofing
                            </span>
                        </h4>
                    </div>
                </div>

                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__picture card__picture--2">
                            &nbsp;
                        </div>
                        <h4 class="card__heading">
                            <span class="card__heading-span">
                                Spotify Mock
                            </span>
                        </h4>
                    </div>
                </div>

                <div class="col-1-of-3">
                    <div class="card">
                        <div class="card__picture card__picture--3">
                            &nbsp;
                        </div>
                        <h4 class="card__heading">
                            <span class="card__heading-span">
                                Rent Me
                            </span>
                        </h4>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-contact" id="contact">
            <div class="u-center-text u-margin-bottom-medium-large">
                <h2 class="heading-secondary heading-secondary--white u-margin-bottom-medium-small u-margin-top-x-large" id="contact">
                    Contact Me
                </h2>
            </div>
            <form class="form u-center-text" method="post" action="contact.php">
                <div class="form__container">
                    <label for="name" class="form__label">Name</label>
                    <input 
                        class="form__input form__input--name"
                        type="text"
                        name="name"
                        placeholder="Name"
                        required
                    />
                    <label for="email" class="form__label">Email</label>
                    <input 
                        class="form__input form__input--email"
                        type="email"
                        name="email"
                        placeholder="Email"
                        required
                    />                    
                    <label for="email" class="form__label">Message</label>
                    <textarea 
                        class="form__input form__input--message"
                        name="message"
                        placeholder="Message"
                        rows="7"
                        required
                    ></textarea>
                    <input
                        class="btn form__btn"
                        type="submit"
                        name="submit"
                    />
                </div>
            </form>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__copyright">
            <span class="footer__copyright-name">Brandon Saravia</span> <span class="footer__copyright-logo">&copy;2020</span>
        </div>
    </footer>

    <!-- About Section onmouseover skills highlighter -->
    <script>

        function highlight(array) {
            // takes argument [[type, classname, color], [type, classname, color], etc...]
            for (let i = 0; i < array.length; i++) {
                if (array[i][0] === 'item') {

                    let element = document.querySelector(".list__" + array[i][1]);
                    element.style.backgroundColor = array[i][2];
                    element.style.fontWeight = 'bold';

                } else if (array[i][0] === 'logo') {

                    let element = document.querySelector(".composition__" + array[i][1]);
                    element.style.color = array[i][2];
                    element.style.textShadow = '0 0 1.5rem ' + array[i][2];

                } else {

                    console.log(array);
                    throw console.error("highlight() argument not accepted");
                }
            }
        }

        function removeHighlight(array) {
            // takes argument [[type, classname], [type, classname], etc...]
            for (let i = 0; i < array.length; i++) {
                if (array[i][0] === 'item') {

                    let element = document.querySelector(".list__" + array[i][1]);
                    element.style.backgroundColor = 'white';
                    element.style.fontWeight = '400';

                } else if (array[i][0] === 'logo') {

                    element = document.querySelector(".composition__" + array[i][1]);
                    element.style.color = 'white';
                    element.style.textShadow = 'none';
                } else {

                    console.log(array);
                    throw console.error("removeHighlight() argument not accepted");
                }
            }
        }
    </script>

    <!-- onScroll Animations -->
    <script>

        let used = false;
        let aboutSectionSeen = false;

        // let header = document.getElementById("header");
        // let about = document.getElementById("about");
        // let projects = document.getElementById("projects");
        // let contact = document.getElementById("contact");
        // let a = header.scrollHeight;
        // let b = about.scrollHeight;
        // let c = projects.scrollHeight;
        // let d = contact.scrollHeight;

        // console.log(a + b + c + d)
        // console.log(window.height)

        
        window.addEventListener("scroll", () => {
            const scrolled = window.scrollY;

            // about section animation
            if (Math.ceil(scrolled) > window.innerHeight - .5 * window.innerHeight && aboutSectionSeen === false) {
                let opacity = document.getElementById("remove-about-section-opacity");

                opacity.classList.remove("u-opacity-0");

                let leftContent = document.getElementById("left-content-animation");
                let rightTopContent = document.getElementById("right-top-content-animation");
                let rightBottomContent = document.getElementById("right-bottom-content-animation");

                leftContent.classList.add('u-move-in-left-animation');
                rightTopContent.classList.add('u-move-in-right-animation');
                rightBottomContent.classList.add('u-move-in-bottom-animation');

                aboutSectionSeen = true;
                used = true;
            } 


            // // projects section animations
            // if (Math.ceil(scrolled) > window.innerHeight - .5 * window.innerHeight && aboutSectionSeen === false) {
            //     let opacity = document.getElementById("remove-about-section-opacity");

            //     opacity.classList.remove("u-opacity-0");

            //     let leftContent = document.getElementById("left-content-animation");
            //     let rightTopContent = document.getElementById("right-top-content-animation");
            //     let rightBottomContent = document.getElementById("right-bottom-content-animation");

            //     leftContent.classList.add('u-move-in-left-animation');
            //     rightTopContent.classList.add('u-move-in-right-animation');
            //     rightBottomContent.classList.add('u-move-in-bottom-animation');

            //     aboutSectionSeen = true;
            //     used = true;
            // } 


            // // about section animation
            // if (Math.ceil(scrolled) > window.innerHeight - .5 * window.innerHeight && aboutSectionSeen === false) {
            //     let opacity = document.getElementById("remove-about-section-opacity");

            //     opacity.classList.remove("u-opacity-0");

            //     let leftContent = document.getElementById("left-content-animation");
            //     let rightTopContent = document.getElementById("right-top-content-animation");
            //     let rightBottomContent = document.getElementById("right-bottom-content-animation");

            //     leftContent.classList.add('u-move-in-left-animation');
            //     rightTopContent.classList.add('u-move-in-right-animation');
            //     rightBottomContent.classList.add('u-move-in-bottom-animation');

            //     aboutSectionSeen = true;
            //     used = true;
            // } 


            // reset animations
            if (Math.ceil(scrolled) < window.innerHeight - .9 * window.innerHeight && used === true) {
                let opacity = document.getElementById("remove-about-section-opacity");

                opacity.classList.add("u-opacity-0");

                let leftContent = document.getElementById("left-content-animation");
                let rightTopContent = document.getElementById("right-top-content-animation");
                let rightBottomContent = document.getElementById("right-bottom-content-animation");

                leftContent.classList.remove('u-move-in-left-animation');
                rightTopContent.classList.remove('u-move-in-right-animation');
                rightBottomContent.classList.remove('u-move-in-bottom-animation');

                aboutSectionSeen = false;
                used = false;
            }

        });
        
    </script>

</body>
</html>