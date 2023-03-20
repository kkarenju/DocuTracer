<div id="left-side-bar">
    <label><i class="fa fa-dashboard"></i>&nbsp;|&nbsp;DashBoard</label>
    <ul>
        <li class="<?php if($pg =='home'){echo 'active-side-bar';}?>">
            <a href='./index.php'><i class="fa fa-home"></i>Home</a>
        </li>
        <li class="<?php if($pg =='settings'){echo 'active-side-bar';}?>">
            <a href=""><i class="fa fa-users"></i>Users</a>
        </li>
        <li class="<?php if($pg =='settings'){echo 'active-side-bar';}?>">
            <a href="">Lost Documents</a>
        </li>
        <li class="<?php if($pg =='settings'){echo 'active-side-bar';}?>">
            <a href="">Found Documents</a>
        </li>
        
        <li class="<?php if($pg =='settings'){echo 'active-side-bar';}?>">
            <a href="">Rejected Lost</a>
        </li>
        <li class="<?php if($pg =='settings'){echo 'active-side-bar';}?>">
            <a href="">Rejected Found</a>
        </li>
    </ul>
</div>