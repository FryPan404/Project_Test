<!DOCTYPE html>
<html>
<head>
	<title>Project Test</title>
	<style>
		@import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap');
*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body
{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #161623;
}
body::before
{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#f00,#f0f);
    clip-path: circle(30% at right 70%);
}
/* body::after
{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(#2196f3,#e91e63);
    clip-path: circle(30% at 10% 10%);
} */
.container{
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    max-width: 1200px;
    flex-wrap: wrap;
    z-index: 1;
}
.container .card
{
    position: relative;
    width: 350px;
    height: 250px;
    margin: 30px;
    box-shadow: 20px 20px 50px rgba(0,0,0, 0.5);
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.1);
    overflow: hidden;
    justify-content: center;
    align-items: center;
    border-top: 1px solid rgba(255, 255, 255, 0.5);
    border-left: 1px solid rgba(255, 255, 255, 0.5);
    backdrop-filter: blur(5px);

}

.container .card .content
{
    margin-top: 20%;
    width: 100%;
    height: 100%;
    justify-content: center;
    align-items: center;
}
td{
    align-items: center;
}

/*.container .card .content
{
    padding: 20px;
    text-align: center;
    transform: translateY(100px);
    opacity: 0;
    transition: 0.5s;
}
.container .card:hover .content{
    transform: translateY(0px);
    opacity: 1;
}*/
.container .card .content h2
{
    position: absolute;
    top: -80px;
    right: 30px;
    font-size: 8em;
    color: rgba(255, 255, 255, 0.05);
    pointer-events: none;
}
.container .card .content h3{
    font-size: 1.8em;
    color: #fff;
    z-index: 1;
}
.container .card .content p{
    font-size: 1em;
    color: #fff;
    font-weight: 300;
}
.container .card .content a
{
    position: relative;
    display: inline-block;
    padding: 8px 20px;
    margin-top: 15px;
    background: #fff;
    color: #000;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 500;
    box-shadow: 0 5px rgba(0,0,0, 0.2);
}
	</style>
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="content">
		<form action="<?php echo base_url('auth/login'); ?>" method="post">		
		<table width="100%">
			<tr>
				<td></td>
				<td align="center"><small><?= $this->session->flashdata('message');  ?></small></td>
			</tr>
			<tr>
				<td width="30%"><font color="white">Username</font></td>
				<td align="center"><input type="text" name="reg_number" id="reg_number" value="<?php echo set_value('reg_number'); ?>">
				<small>	<?= form_error('reg_number');  ?></small></td>
			</tr>
			<tr>
				<td><font color="white">Password</font></td>
				<td align="center"><input type="password" name="password" id="password">
				<small><?= form_error('password');  ?></small></td>
			</tr>
			<tr>
				<td></td>
				<td align="center"><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
	</div>
	</div>
	</div>
	
</body>
</html>