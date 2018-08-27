<template>
    <div class="form-group">
        <label class="control-label">Anexos</label>
        <table class="table">
            <thead>
                <tr v-if="!anexos.length">
                    <td colspan="2" style="padding-left: 0; padding-right: 0">
                        Nenhum anexo
                    </td>
                </tr>
                <tr v-for="anexo in anexos" :key="anexo.id">
                    <td style="padding-left: 0">
                        <input type="file" name="anexo[]">
                    </td>
                    <td style="padding-right: 0" class="text-right">
                        <button type="button" class="btn btn-danger btn-sm" @click="removeAnexo(anexo.id)">
                            <i class="fa fa-close"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-left: 0; padding-right: 0">
                        <button type="button" class="btn-sm btn-success btn" @click="novoAnexo" :disabled="anexos.length >= 5">
                            Novo Anexo
                        </button>
                    </td>
                </tr>
            </thead>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            anexos: []
        }
    },
    methods: {
        novoAnexo() {
            this.anexos.push({
                id: this.anexos.length > 0 ? this.anexos[this.anexos.length - 1].id + 1 : 1
            });
        },
        removeAnexo(id) {
            this.anexos = this.anexos.filter(anexo => anexo.id != id);
        }
    }
}
</script>