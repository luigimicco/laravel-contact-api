<template>
	<div class="container-fluid pt-5">
    <section id="contacts" class="col-9 mx-auto">
      <div class="container py-5 my-4">

        <Loader v-if="isLoading" />
        <div
          class="alert d-flex justify-content-between align-items-center"
          :class="`alert-${type}`"
          role="alert"
          v-if="alert && !isLoading"
        >
          <span v-if="alertMessage">{{ alertMessage }} </span>
          <ul v-if="hasErrors" class="mb-0 pl-4">
            <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
          </ul>
          <span @click="alert = !alert" class="h2 mb-0" role="button"
            >&times;</span
          >
        </div>


        <h2 class="h1-responsive font-weight-bold text-center my-4">
          Contattaci
        </h2>
        <p class="text-center w-responsive mx-auto mb-5">
          Hai qualche domanda? Non esitare a contattarci direttamente. Il nostro
          team ti risponderà in poche ore per aiutarti.
        </p>
        <div class="row">
          <div class="col-md-12 mb-md-0 mb-5">
            <div class="row">
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="name" v-model="form.name" class="form-control border-info"
                    :class="{ 'is-invalid': errors.name }"
                  />
                  <div v-if="errors.name" class="invalid-feedback">
                    {{ errors.name }}
                  </div>
                  <label v-else for="name" class="">Il tuo nome</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="md-form mb-0">
                  <input type="text" id="email" v-model="form.email" class="form-control border-info"
                    :class="{ 'is-invalid': errors.email }"
                  />
                  <div v-if="errors.email" class="invalid-feedback">
                    {{ errors.email }}
                  </div>
                  <label v-else for="email">La tua email</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form mb-0">
                  <input type="text" id="subject" v-model="form.subject" class="form-control border-info"
                    :class="{ 'is-invalid': errors.subject }"
                  />
                  <div v-if="errors.subject" class="invalid-feedback">
                    {{ errors.subject }}
                  </div>
                  <label v-else for="subject">Oggetto</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="md-form">
                  <textarea type="text" id="message" v-model="form.message" rows="4" class="form-control border-info md-textarea"
                    :class="{ 'is-invalid': errors.message }"
                  ></textarea>
                  <div v-if="errors.message" class="invalid-feedback">
                    {{ errors.message }}
                  </div>
                  <label v-else for="message">Il tuo messaggio</label>
                </div>
              </div>
            </div>
            <div class="d-flex justify-content-center text-md-left m-3">
              <button class="btn btn-primary" @click="sendForm">Invia</button>
            </div>
            <div class="status"></div>
          </div>
        </div>

      </div>
    </section>
	</div>
</template>

<script>
import Loader from "../components/Loader.vue";
import { isEmpty } from "lodash";  // importo solo la funzione che mi serve

export default {
	name: "Contactpage",
	data() {
		return {
			form: {
				name: "",
				email: "",
				subject: "",
				message: "",
			},
			errors: {},
			type: "",
			alert: false,
			isLoading: false,
			alertMessage: "",
		};
	}, 
  components: { Loader }, 
	computed: {
		hasErrors() {
			// ! Ha errori se non è vuoto, se è vuoto non ha errori
			return !isEmpty(this.errors); //Object.keys(this.errors).lenth;
		},
	}, 
	methods: {
		validateForm() {
			// Validazione
			const errors = {}; // ! oggetto vuoto inizialmente 

			if (!this.form.name.trim()) errors.name = "Il nome non è valido.";
			if (!this.form.email.trim()) errors.email = "La mail è obbligatoria.";
			if (!this.form.subject.trim()) errors.subject = "Non hai inserito un oggetto.";
			if (!this.form.message.trim()) errors.message = "Il testo del messaggio è obbligatorio.";			

			// Controllo che sia una mail e che sia valida usando le espressioni regolari
			if (
				this.form.email.trim() &&
				!this.form.email.match(/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)
			)
				errors.email = "La mail non è valida";

			this.errors = errors;
      this.alertMessage = "Sono presenti degli errori.";
      this.type = "danger";
			this.alert = true;

		},
		sendForm() {
			// console.log(this.form);

			// * Richiamo validateForm
			this.validateForm();

      // Controllo se ci sono errori
      if (!this.hasErrors) {



      }
    },  
  },       
};
</script>

<style lang="scss" scoped>
#contacts {
	background-color: #fff;
	border-radius: 20px;
}
</style>