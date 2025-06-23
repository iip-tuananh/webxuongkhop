
<script>
    class ProductBanner extends BaseClass {
        no_set = [];

        before(form) {
            this.image = {};
            this.image_back = {};
        }

        after(form) {
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get image_back() {
            return this._image_back;
        }

        set image_back(value) {
            this._image_back = new Image(value, this);
        }

        clearImage() {
            if (this.image) this.image.clear();
            if (this.image_back) this.image_back.clear();
        }


        get submit_data() {
            let data = {
                title: this.title,
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;
            if (image) data.append('image', image);

            return data;
        }
    }
</script>
