<script>
    class Review extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
            this.type = 'text';
        }

        after(form) {

        }

        // Ảnh đại diện
        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);

        }

        clearImage() {
            if (this.image) this.image.clear();
        }

        get submit_data() {
            let data = {
                name: this.name,
                position: this.position,
                message: this.message,
                type: this.type,
                youtube: this.youtube,
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;

            if (image) data.append('image', image);

            return data;
        }
    }
</script>
