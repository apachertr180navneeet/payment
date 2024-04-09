<div class="row">
    <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-sm-row mb-4">
            <li class="nav-item">
                <a class="nav-link {{ request()->is("admin/resources/company/profile/{$company->id}") ? 'active' : ''}}" href="{{ route('admin.resources.company.profile',$company->id) }}"><i class="bx bx-user me-1"></i> Company Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is("admin/resources/company/image/{$company->id}") ? 'active' : ''}}" href="{{ route('admin.resources.company.image',$company->id) }}"><i class="bx bx-group me-1"></i> Company Logo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is("admin/resources/company/news/{$company->id}") ? 'active' : ''}}" href="{{ route('admin.resources.company.news',$company->id) }}"><i class="bx bx-grid-alt me-1"></i> Company News</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is("admin/resources/company/notice/{$company->id}") ? 'active' : ''}}" href="{{ route('admin.resources.company.notice',$company->id) }}"><i class="bx bx-link-alt me-1"></i> Company Notice </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=""><i class="bx bx-link-alt me-1"></i> Company Support Information </a>
            </li>
        </ul>
    </div>
</div>
