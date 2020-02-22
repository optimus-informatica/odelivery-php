<template>
<form v-on:submit="login">
    <div class="form-group">
        <label for="username">Usu&aacute;rio:</label>
        <input v-model="form.username" id="username" type="text" class="form-control" aria-describedby="usernameHelp" placeholder="Nome de usu&aacute;rio" required />
        <small id="usernameHelp" class="form-text text-muted">Entre com seu nome de usu&aacute;rio para efetuar o login no sistema.</small>
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input v-model="form.password" id="password" type="password" class="form-control" placeholder="sua senha" required />
    </div>
    <div class="form-check">
        <input v-model="form.remember" id="remember" type="checkbox" class="form-check-input" value="1">
        <label class="form-check-label" for="remember">Lembrar-me</label>
    </div>
    <div v-bind:class="resultCl">{{resultMsg}}</div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>
</template>

<script>
import axios from 'axios';
import {
    BootstrapVue,
    IconsPlugin
} from 'bootstrap-vue';

export default {
    data() {
        return {
            resultMsg: '',
            resultCl: {'alert': false, 'alert-danger': false},
            form: {
                username: '',
                password: '',
                remember: '',
            }
        }
    },
    methods: {
        login(e) {
            e.preventDefault();

            var headers = new Headers();
            headers.append("X-CSRF-TOKEN", this.token);
            fetch("/login", {
                "method": "post",
                "headers": {
                    'X-CSRF-TOKEN': this.token,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                "body": JSON.stringify(this.form)
            }).then(response => {
                return response.json();
            }).then(jsonObj => {
                if (jsonObj['err']) {
                    this.resultMsg = jsonObj['msg'];
                    this.resultCl = {'alert': true, 'alert-danger': true};
                }
                console.log(jsonObj);
            });
        }
    },
    props: ['token']
}
</script>
