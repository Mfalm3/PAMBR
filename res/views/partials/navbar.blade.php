<nav class="navbar navbar-dark navbar-expand-md bg-dark">
    <h4 class="text-light">Php Message Backup Reader</h4>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav ml-auto mt-2 mr-5 mt-lg-0">
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#howToUseModal">How to use</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#aboutModal">About</a>
        </li>
    </ul>
    </div>
</nav>

<!--How to use-->
<div class="modal fade" id="howToUseModal" tabindex="-1" role="dialog" aria-labelledby="howToUseModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="howToUseModalTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!--About-->
<div class="modal fade" id="aboutModal" tabindex="-1" role="dialog" aria-labelledby="aboutModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered .modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aboutModalTitle">About</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center col-8 offset-2">
                    <p class="text-dark">Authors</p>
                    <a href="https://github.com/mfalm3/PAMXBR">Mfalm3</a>
                </div>
                <div class="text-center col-8 offset-2 mt-2">
                    <p>Credits</p>
                    <ul class="list-group">
                        <li class="list-group-item">Cras justo odio</li>
                        <li class="list-group-item">Dapibus ac facilisis in</li>
                        <li class="list-group-item">Morbi leo risus</li>
                        <li class="list-group-item">Porta ac consectetur ac</li>
                        <li class="list-group-item">Vestibulum at eros</li>
                    </ul>
                </div>
        </div>
    </div>
</div>
</div>