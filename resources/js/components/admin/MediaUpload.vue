<template>
    <section class="border border-1 p-3">
        <div class="container-fluid mb-3">
            <div class="row">
                <div v-for="(image, i) in uploadedFiles" :key="'uploaded_image_' + i" class="col-lg-3 col-4 mb-2">
                    <img :src="image" width="100%" class="w-100">
                </div>
            </div>
        </div>
        <div class="text-end">
            <input type="file" name="media[]" multiple accept="image/*" hidden class="d-none" id="upload_media_hidden_input" @change="fileUploadHandler">
            <label for="upload_media_hidden_input" class="btn btn-outline-info btn-lg">
                <i class="bi bi-images"></i>
                Upload Media
            </label>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            uploadedFiles: []
        }
    },
    methods: {
        fileUploadHandler (event) {
            for (let i = 0; i < event.target.files.length; i++) {
                const reader = new FileReader();
                reader.onload = () => {
                    this.uploadedFiles.push(reader.result);
                };

                reader.readAsDataURL(event.target.files[i]);
            }
        }
    }
}
</script>
