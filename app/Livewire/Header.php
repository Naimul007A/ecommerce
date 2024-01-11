<?php

    namespace App\Livewire;

    use Livewire\Attributes\On;
    use Livewire\Component;

    class Header extends Component {
        #[On('cartChanged')]
        function updateHeader () {

        }

        public function render () {
            return view ( 'livewire.header' );
        }
    }
