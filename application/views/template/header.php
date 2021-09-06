<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url().'assets/datatables/css/jquery.dataTables.min.css' ?>">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poopins:wght@300;400;500;600&display=swap');

:root{
    --main-color: #DD2F6E;
    --color-dark: #1D2231;
    --text-grey: #8390A2;
}

*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    list-style-type: none;
    text-decoration: none;
    font-family: 'Poopins', sans-serif;
}

.sidebar{
    width: 345px;
    position: fixed;
    height: 100%;
    top: 0;
    left: 0;
    background-color: var(--main-color);
    z-index: 100;
    transition: width 300ms;
}

.sidebar-brand{
    height: 90px;
    padding: 1rem 0rem 1rem 2rem;
    color: #fff;
}

.sidebar-brand span{
    display: inline-block;
    padding-right: 1rem;
}
.sidebar-menu{
    margin-top: 1rem;
}
.sidebar-menu li{
    width: 100%;
    margin-bottom: 1.3rem;
    padding-left: 1rem;
}
.sidebar-menu a{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.1rem;
}
.sidebar-menu a.active{
    background: #fff;
    padding-top: 1rem ;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0px 0px 30px;
}
.sidebar-menu a span:first-child{
    font-size: 1.5rem;
    padding-right: 1rem;
}

#nav-toggle:checked + .sidebar
{
    width: 60px;
}


#nav-toggle:checked + .sidebar .sidebar-brand,
#nav-toggle:checked + .sidebar  li
{
    padding-left: 1rem;
    text-align: right;
}
#nav-toggle:checked + .sidebar  li a
{
    padding-left: 0rem;
}

#nav-toggle:checked + .sidebar .sidebar-brand h2 span:last-child,
#nav-toggle:checked + .sidebar  li a span:last-child
{
    display: none;
}
#nav-toggle:checked ~ .main-content
{
    margin-left: 60px;
}
#nav-toggle:checked ~ .main-content header
{
    width: calc(100% - 60px);
    left: 60px;
}


.main-content{
    transition: margin-left 300ms;
    margin-left: 345px;
}
header{
    background: #fff;
    display: flex;
    justify-content: space-between;
    padding: 1rem 1.5rem;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    position: fixed;
    left: 345px;
    width: calc(100% - 345px);
    top: 0;
    z-index: 100;
    transition: left 300ms;
}
header h2{
    color: #222;
}
header label span{
    font-size: 1.7rem;
    padding-right: 1rem;
}
.search-wrapper {
    border: 1px solid #ccc;
    border-radius: 30px;
    height: 50px;
    display: flex;
    align-items: center;
    overflow-x: hidden;
}
.search-wrapper span{
    display: inline-block;
    padding: 0rem 1rem;
    font-size: 1.5rem;
}
.search-wrapper input{
    height: 100%;
    padding: .5rem;
    border: none;
    outline: none;
}
.user-wrapper{
    display: flex;
    align-items: center;
}
.user-wrapper img{
    border-radius: 50%;
    margin-right: 1rem;
}


.user-wrapper small{
    display: inline-block;
    color: var(--text-grey);
}
main{
    margin-top: 85px;
    padding: 2rem 1.5rem;
    background: #f1f5f9;
    min-height: calc(100vh - 90px);
}
.cards{
    display: contents;
    grid-template-columns: repeat(4, 1fr);
    grid-gap: 2rem;
    margin-top: 1rem;
}
.card-single{
    display: flex;
    justify-content: space-between;
    background: #fff;
    padding: 2rem;
    border-radius: 2px;
}

.card-single div:last-child span{
    font-size: 3rem;
    color: var(--main-color);
 

}
.card-single div:first-child span{
    color: var(--text-grey);
}
.card-single:last-child{
    background: var(--main-color);
}

.card-single:last-child h1,
.card-single:last-child div:first-child span,
.card-single:last-child div:last-child span
{
color: #fff;
}

@media only screen and (max-width : 1200px){
    
}
    </style>
    
</head>
<body>
    <input type="checkbox" id="nav-toggle">
        <div class="sidebar">
            <div class="sidebar-brand">
                <h2><span class="lab la-envira"></span><span>Dashboard</span></h2>
            </div>
            <?php if ($this->session->userdata('level') == 'admin') {
                ?>
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('admin/index') ?>" class="active"><span class="las la-home"></span><span>Home</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/siswa') ?>"><span class="las la-pager"></span><span>Siswa</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('admin/password_reset') ?>"><span class="las la-key"></span><span>Reset Password</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('auth/logout') ?>"><span class="las la-sign-out-alt"></span><span>Log Out</span></a>
                            </li>
                        </ul>
                    </div>
            <?php }else{ ?>
                    <div class="sidebar-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('siswa/index') ?>" class="active"><span class="las la-home"></span><span>Home</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('siswa/datasiswa') ?>"><span class="las la-pager"></span><span>Siswa</span></a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('auth/logout') ?>"><span class="las la-sign-out-alt"></span><span>Log Out</span></a>
                            </li>
                        </ul>
                    </div>
                
            <?php } ?>
            
        </div>
        <div class="main-content">
            <header>
                <h2>
                        <label for="nav-toggle">
                            <span class="las la-bars"></span>
                        </label>
                        Dashboard
                </h2>
                <div class="search-wrapper">
                    <span class="las la-search"></span>
                    <input type="search" placeholder="Search here">
                </div>
                <div class="user-wrapper">
                    <img src="image/benu.png" alt="" width="40px" height="40px" >
                    <div>
                    
                   
                    </div>
                </div>
            </header>