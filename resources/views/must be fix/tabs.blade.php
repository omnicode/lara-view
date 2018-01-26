<ul class="nav nav-tabs">
    @for($period = 1; $period <= config('app_config.projection.year_interval'); $period++)
        @php
            $year = getRequestAttribute('business.year') + $period - 1;
            $periodQP = config('app_config.query_params.general.period');
            $activePeriod = !empty(app('request')[$periodQP]) ? app('request')[$periodQP] : 1;
            $active = ($activePeriod == $period) ? true : false;
            $params = $period != 1 ?  [$periodQP => $period] : [];
        @endphp
        <li {{ ($active) ? 'class=active' : '' }}>
            <a href="{{ route($_route, $params) }}" {{ ($period == 2) ? 'onclick=return false' : '' }}>
                {{ __('Year :year', ['year' => $year]) }}
            </a>
        </li>
    @endfor
</ul>
