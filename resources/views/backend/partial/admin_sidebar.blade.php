<!--sidebar-menu-->
@php
  $url = url()->current();
@endphp
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
  <li class="{{(preg_match('/dashboard/i',$url))?"active":""}}" ><a href="{{route('admin.dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

    <li class="submenu {{(preg_match('/profile/i',$url))?"active":""}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Profile</span></a>
      <ul>
        <li><a href="{{ route('admin.profile')}}">View Profile</a></li>
      </ul>
    </li>

    <li class="submenu {{(preg_match('/skill/i',$url))?"active":""}}">
        <a href="#"><i class="icon icon-th-list"></i> <span>Skills</span> </a>
      <ul>
        <li><a href="{{ route('admin.skill.create') }}">Add Skills</a></li>
        <li><a href="{{ route('admin.skills.index') }}">View Skills</a></li>
      </ul>
    </li>

    <li class="submenu {{(preg_match('/summary/i',$url))?"active":""}}"> <a href="#"><i class="icon icon-th-list"></i> <span>Summary</span></a>
        <ul>
          <li><a href="{{ route('admin.summary.create') }}">Add Summary</a></li>
          <li><a href="{{ route('admin.summary.index') }}">View Summary</a></li>
        </ul>
    </li>

    <li class="submenu  {{(preg_match('/project/i',$url))?"active":""}}">
        <a href="#"><i class="icon icon-th-list"></i> <span>Project</span></a>
        <ul>
          <li><a href="{{ route('admin.project.create') }}">Add Project</a></li>
          <li><a href="{{ route('admin.project.index') }}">Projects</a></li>
        </ul>
    </li>
    <li class="submenu  {{(preg_match('/link/i',$url))?"active":""}}">
        <a href="#"><i class="icon icon-th-list"></i> <span>Links </span></a>
        <ul>
          <li><a href="{{ route('admin.github') }}">Github</a></li>
          <li><a href="{{ route('admin.facebook') }}">Facebook</a></li>
          <li><a href="{{ route('admin.linkedin') }}">LinkedIn</a></li>
          <li><a href="{{ route('admin.twitter') }}">Twitter</a></li>
        </ul>
    </li>





  </ul>
</div>
<!--sidebar-menu-->
