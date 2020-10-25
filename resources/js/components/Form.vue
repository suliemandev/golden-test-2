<template>
    <div class="container">
        <h4 style="margin-bottom: 15px;">{{ translate['form_subtitle'] }}</h4>
        <form action="#" class="row" @submit.prevent="submit">
            <div class="col-md-8">
                <div class="form row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" :placeholder="translate['first_name']" v-model="client.first_name" class="form-control" required :disabled="client.ready">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" :placeholder="translate['last_name']" v-model="client.last_name" class="form-control" required :disabled="client.ready">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="email" :placeholder="translate['email']" v-model="client.email" class="form-control" required :disabled="client.ready">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mbb-0">
                            <input type="number" :placeholder="translate['phone']" v-model="client.phone" class="form-control" required :disabled="client.ready">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mbb-0">
                            <input type="text" :placeholder="translate['address']" v-model="client.address" class="form-control" required :disabled="client.ready">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="confirm">
                    <button type="submit" class="btn btn-primary" :disabled="client.ready">{{ translate['confirm'] }}</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
const LOCALE_NAME = 'quiz_data';

    export default {
        props: ['client', 'translate'],
        data() {
            return {

            }
        },

        methods: {
            submit() {

                let conf = window.confirm(this.translate['are_you_sure']);
                if(!conf) return;
                
                console.log(this.$parent.LOCALE_NAME);
                let local = this.$parent.get_localstorage(LOCALE_NAME);
                if (local) {
                    this.$parent.set_localstorage(LOCALE_NAME, 'client', this.client);
                    this.client.ready = true;
                } else {
                    alert('Error saving in storage');
                }
            }
        }
    }
</script>


<style lang="scss" scoped>

@media (min-width: 768px) {
  .mbb-0 {
      margin-bottom: 0;
  }
}

  .confirm {
    display:flex;
    align-items:center;
    justify-content:center;
    height:100%;
    button {
        width: 100%;
        height: 100%;
        font-size: 20px;
    }
  }
</style>