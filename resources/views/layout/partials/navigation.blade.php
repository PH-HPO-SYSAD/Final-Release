<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">HPO Asset Inventory</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Asset <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/asset">View all Asset</a></li>
                        <li><a href="/asset/create">Add Asset</a></li>
                    </ul>
                </li>
                <li class=""><a href="/audit">Audit <span class="sr-only">(current)</span></a></li>
                <li class=""><a href="/asset/deployment">Deployment <span class="sr-only">(current)</span></a></li>
                <li class="Logout">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> {{ auth()->user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="/account/update">Account Settings</a></li>
                        <li><a href="/auth/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>