<link rel="stylesheet" href="<?=SITE_URL?>templates/default/assets/src/css/modal.css">
<?php
require_once "include/head.php";
?>

<body>

<div class="wrapper">

    <?php
    require_once "include/header.php";
    ?>




    <div class="page-wrap">


        <?php
        require_once "include/asider.php";
        ?>


        <div class="main-content">
            <div class="card-head">
                <span class="title-head">Квартал Мытищи</span>
                <span class="main-head">О проекте</span>
                <span class="main-head">Генплан</span>
                <span class="main-head">Ипотека</span>
                <span class="main-head">Расположения</span>
                <span class="main-head">Планировки</span>
            </div>
            <div class="container-fluid" style="position: relative">
                <div class="img-rublyovka" style="min-height: 629.438px; display: flex; flex-direction: column; position: relative">
                    <div class="building-selection_wrap" style="position: absolute">
                        <button class="back-btn" type="button" id="back-btn2" onclick="back_tomain()"><</button>
                        <button class="back-btn" type="button" id="back-btn1" hidden="true" onclick="back()"><</button>
                        <img src="<?=SITE_URL?>templates/default/assets/imgs/main-plan-ostafevo.jpg" alt=""  class="mytishi-img">

                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080" class="building-selection">

                    <g class="visual_poly" ><polygon id="first-house-ostafevo" class="build-selection0" points="589.9,551 576.8,540.8 566.6,480 632.4,451.8 709.1,508.1 715,559.3 715.6,559.3
		712.9,535.5 733.6,525.5 813.8,583.5 819,647 631.1,751.8 557,682.3 544.9,618.6 568.8,607.1 628.6,659.3 709.8,617.9 725.9,630.5
		730.1,665.9 775.3,641.6 632,533.5 	"></g>



                    </div>
                </div>
            </div>


            <script>
                const mytishi_img = document.querySelector('.mytishi-img')
                const building_selection = document.querySelectorAll('.build-selection0')
                for (let i = 0; i < building_selection.length; i++) {
                    building_selection[i].addEventListener('click', function (e){
                        document.querySelector('#back-btn2').setAttribute('hidden', true)
                        document.getElementById("back-btn1").removeAttribute("hidden")
                        mytishi_img.setAttribute('src', '<?=SITE_URL?>templates/default/assets/imgs/'+ e.target.id +'.jpg')
                        switch (e.target.id){
                            case 'first-house-mytishi':
                                document.querySelectorAll('.st1').forEach(function (ev) {
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'second-house-mytishi':
                                document.querySelectorAll('.st2').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'third-house-mytishi':
                                document.querySelectorAll('.st3').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'fourth-house-mytishi':
                                document.querySelectorAll('.st4').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'fifth-house-mytishi':
                                document.querySelectorAll('.st4').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                            case 'sixth-house-mytishi':
                                document.querySelectorAll('.st5').forEach(function (ev){
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                        }
                        document.querySelectorAll('.build-selection0').forEach(function (ev){
                            e.onclick = ev.setAttribute('hidden', true)
                        })
                    })

                }
                const first_sections = document.querySelectorAll('.st1')
                for (let i = 0; i < first_sections.length; i++) {
                    first_sections[i].addEventListener('click', function (e){

                    })
                }
                function back(){
                    console.log(document.querySelector("#back-btn2").getAttribute('hidden'))
                    document.querySelector("#back-btn2").removeAttribute('hidden')
                    document.querySelector(".mytishi-img").setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/main-plan-mytishi.jpg")
                    document.querySelectorAll('.hover').forEach(function (ev) {
                        ev.setAttribute('hidden', true)
                    })
                    document.querySelectorAll(".build-selection0").forEach(function (el) {
                        el.removeAttribute("hidden");
                    });
                    document.getElementById("back-btn1").setAttribute("hidden", true)
                }
                function back_tomain(){
                    window.location.href = '/projects'
                }


            </script>
            <style>
                .back-btn{
                    position: absolute; z-index: 999; top: 40px; left: 40px; font-size: 24px;
                    border: none;
                    background-color: white;
                    color: #007bfb;
                    width: 3%;
                    height: 5%;
                    border-radius: 35px;
                    transition: all .3s;
                }
                .back-btn:hover{
                    background-color: #007bfb;
                    color: white;
                    border-radius: 8px;
                    transition: all .3s;
                }
                .mytishi-img{
                    position: relative;
                    width: 100%; border-radius: 50px; border: solid 4px #404E67; z-index: 1;
                }
                .building-selection{
                    position: absolute;
                    top: 0;
                    left: 0;
                    z-index: 2;
                    display: block;
                    width: 100%;
                    height: 100%;
                }
                polygon{
                    position: static;
                }
                .card-head{
                    display: flex;
                    justify-content: space-between;
                    margin-left: 80px;
                    margin-right: 65px;
                }
                .title-head{
                    font-size: 32px;
                }
                .main-head{
                    margin-top: 15px;
                    font-size: 20px;
                    color: rgba(101, 101, 101, 0.85);
                    cursor: pointer;
                }

                .visual_poly {
                    fill: rgba(0, 123, 251, .40);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .visual_poly:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st1 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st1:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st2 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st2:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st3 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st3:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st4 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st4:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
                .st5 {
                    fill: rgba(0, 123, 251, 0.3);
                    stroke: #007bfb;
                    cursor: pointer;
                    transition: .3s;
                }
                .st5:hover{
                    fill: rgba(0, 123, 251, .10);
                    transition: .3s;
                }
            </style>

        </div>

        <aside class="right-sidebar">
            <div class="sidebar-chat" data-plugin="chat-sidebar">
                <div class="sidebar-chat-info">
                </div>
            </div>
        </aside>

        <div class="chat-panel" hidden>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                    <span class="user-name">John Doe</span>
                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="card-body">
                    <div class="widget-chat-activity flex-1">
                        <div class="messages">
                            <div class="message media reply">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/3.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Epic Cheeseburgers come in all kind of styles.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers make your knees weak.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--offline">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>Cheeseburgers will never let you down.</p>
                                    <p>They'll also never run around or desert you.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>A great cheeseburger is a gastronomical event.</p>
                                </div>
                            </div>
                            <div class="message media reply">
                                <figure class="user--busy">
                                    <a href="#">
                                        <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                </div>
                            </div>
                            <div class="message media">
                                <figure class="user--online">
                                    <a href="#">
                                        <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                    </a>
                                </figure>
                                <div class="message-body media-body">
                                    <p>If you are a vegan, we are sorry for you loss.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="javascript:void(0)" class="card-footer" method="post">
                    <div class="d-flex justify-content-end">
                        <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                        <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <?php
        require_once "include/page-footer.php";
        ?>

    </div>
</div>












<style>
    .footer{
        margin-top: 200px;
    }
    .card{
        cursor: pointer;
        border: 2px solid rgba(16, 15, 15, 0.15);
    }
    .card:hover{
        border: 2px solid #007bfb;
    }
    .card-header{
    }
    .card-body{
        border: none;
        padding: 0!important;
    }
    .card-text{
        padding: 20px 20px;
        font-size: 15px;
        color: grey;
    }
</style>
<script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"> </script>
<?php
require_once "include/footer.php";
?>

