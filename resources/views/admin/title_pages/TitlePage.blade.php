
<script>
    class TitlePage extends BaseClass {
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
                page: this.page,
                title_1: this.title_1,
                title_2: this.title_2,
            }

            data = jsonToFormData(data);

            let image = this.image.submit_data;
            if (image) data.append('image', image);
            let image_back = this.image_back.submit_data;
            if (image_back) data.append('image_back', image_back);

            return data;
        }
    }
</script>
