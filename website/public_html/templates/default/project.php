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
                <span class="title-head"><?=$this->projectGlobalInfo['title']?></span>
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
                        <img src="<?=SITE_URL?>templates/default/assets/imgs/houses_page/<?=$this->projectGlobalInfo['project_img']?>" alt=""  class="mytishi-img">

                        <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="2.0" x="0px" viewBox="0 0 1920 1080" class="building-selection">


                        <?php foreach ($this->projectData as $key => $house): ?>
                            <g class="visual_poly">
                            <?php foreach ($house['polygon_points'] as $polygon): ?>
                                <polygon id="<?=$house['houses_id_db']?>-house" class="build-selection0" points="<?=$polygon?>"></polygon>
                            <?php endforeach; ?>
                            </g>
                        <?php endforeach; ?>





                        <?php foreach ($this->projectData as $houseKey => $house): ?>
                                <?php foreach ($house['sections'] as $sectionKey => $section): ?>
                                    <a href="home/floor?id_section=<?=$section['section_db_id']?>">
                                    <g>
                                    <?php foreach ($section['polygon_points'] as $polygonKey => $polygon): ?>
                                        <polygon hidden="true" class="hover st<?=$house['houses_id_db']?>" id="kv<?=$section['section_db_id']?>" points="<?=$polygon?>"></polygon>
                                    <?php endforeach; ?>
                                    </g>
                                    </a>
                                <?php endforeach; ?>

                        <?php endforeach; ?>




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
                        mytishi_img.setAttribute('src', '<?=SITE_URL?>templates/default/assets/imgs/houses/houses'+ e.target.id +'.jpg')
                        console.log(e.target.id);
                        switch (e.target.id){
                        <?php foreach ($this->projectData as $key => $house): ?>
                            case '<?=$house['houses_id_db']?>-house':
                                console.log('<?=$house['houses_id_db']?>-house');
                                document.querySelectorAll('.st<?=$house['houses_id_db']?>').forEach(function (ev) {
                                    e.onclick = ev.removeAttribute('hidden')
                                })
                                break
                        <?php endforeach; ?>

                        }
                        document.querySelectorAll('.build-selection0').forEach(function (ev){
                            e.onclick = ev.setAttribute('hidden', true)
                        })
                    })

                }


                function back(){
                    console.log(document.querySelector("#back-btn2").getAttribute('hidden'))
                    document.querySelector("#back-btn2").removeAttribute('hidden')
                    document.querySelector(".mytishi-img").setAttribute("src", "<?=SITE_URL?>templates/default/assets/imgs/houses_page/<?=$this->projectGlobalInfo['project_img']?>")
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












<div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="quick-search">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 ml-auto mr-auto">
                            <div class="input-wrap">
                                <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                <i class="ik ik-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body d-flex align-items-center">
                <div class="container">
                    <div class="apps-wrap">
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>
                        <div class="app-item dropdown">
                            <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                        </div>
                        <div class="app-item">
                            <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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