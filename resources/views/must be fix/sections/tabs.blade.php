<ul class="nav nav-tabs mb20">

    @foreach($tabs as $tab)
        @php
            $options = [];
            if ($tab['class'] == 'disabled') {
                $options = ['class' => 'disabled'];
            }

        $introPopUps = isset($introPopUps) ? $introPopUps : [];
        $options = addIntroDataInOptions($options, $tab['name'], ConstIntroPopUpComponentType::Tab,  $introPopUps)
        @endphp

        @if ($tab['class'] == 'disabled')
            <li>
                {!! Assistant::link(__($tab['name']), '#', [], $options) !!}
            </li>
        @else
            <li class="{{ $tab['class'] or '' }}">
                {!! Assistant::link(__($tab['name']), $tab['route'], $tab['params'], $options) !!}
            </li>
        @endif
    @endforeach

</ul>
