<?php

    namespace App\Livewire;

    use Illuminate\Support\Facades\Auth;
    use Livewire\Component;
    use phpDocumentor\Reflection\DocBlock\Tags\Return_;

    class Login extends Component {
        public $email;
        public $password;
        protected  $rules = [
            'password'=>'required',
            'email' => 'required|email',
        ];
        public function Login (): ?bool {
            $validatedData = $this->validate();
            $auth = Auth::attempt ($validatedData);
            if (!$auth){
                flash ()->addError ("email or password not match.");
                return true;
            }
            flash ()->addSuccess ("Login Successfully.");
            return $this->redirect ("/profile");
        }
        public function render (): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application {
            return view ( 'livewire.login' );
        }
    }
