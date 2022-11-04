<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('home') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Main parts</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Food Shop
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('food.index') }}">All Food</a>
                        <a class="nav-link" href="{{ route('food.create') }}">Add New Food</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Settings</div>
                <a class="nav-link" href="{{ route('users.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    All Users
                </a>
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    All Roles
                </a>
                <a class="nav-link" href="{{ route('permissions.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    All Permissions
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>
<?php
/**
 * Created by Paul Iyaji.
 * Date: 03/11/2022
 * Time: 16:51
 * Project Name: my-app
 */
