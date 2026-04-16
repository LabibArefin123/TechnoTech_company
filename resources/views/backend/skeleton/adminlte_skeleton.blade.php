<div class="skel-layout">

    <!-- TOP NAVBAR -->
    <div class="skel-navbar">
        <div class="skel-logo"></div>
        <div class="skel-nav-items">
            <div class="skel-circle"></div>
            <div class="skel-circle"></div>
            <div class="skel-circle"></div>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="skel-sidebar">

        <div class="skel-user">
            <div class="skel-avatar"></div>
            <div class="skel-user-text">
                <div class="skel-line short"></div>
                <div class="skel-line tiny"></div>
            </div>
        </div>

        <div class="skel-menu">
            <div class="skel-menu-item"></div>
            <div class="skel-menu-item"></div>
            <div class="skel-menu-item"></div>
            <div class="skel-menu-item"></div>
            <div class="skel-menu-item"></div>
        </div>

    </div>

    <!-- MAIN CONTENT -->
    <div class="skel-content">

        <!-- TOP CARDS -->
        <div class="skel-card-grid">
            <div class="skel-card">
                <div class="skel-card-title"></div>
                <div class="skel-card-value"></div>
            </div>

            <div class="skel-card">
                <div class="skel-card-title"></div>
                <div class="skel-card-value"></div>
            </div>

            <div class="skel-card">
                <div class="skel-card-title"></div>
                <div class="skel-card-value"></div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="skel-table">

            <div class="skel-table-header"></div>

            @for ($i = 0; $i < 6; $i++)
                <div class="skel-table-row">
                    <div class="skel-cell w-25"></div>
                    <div class="skel-cell w-50"></div>
                    <div class="skel-cell w-25"></div>
                </div>
            @endfor

        </div>

    </div>

</div>
