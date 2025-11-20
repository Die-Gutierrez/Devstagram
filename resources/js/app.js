import Dropzone from 'dropzone';
import 'flowbite';
import Swal from 'sweetalert2';

window.Swal = Swal;
Dropzone.autoDiscover = false;

if (document.getElementById('dropzone')) {
    const dropzone = new Dropzone('#dropzone', {
        dictDefaultMessage: 'Sube aquí tu imagen',
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: 'Eliminar archivo',
        maxFiles: 1,
        uploadMultiple: false,
        dictResponseError: 'Error al subir el archivo',
        dictCancelUploadConfirmation: '¿Estás seguro de que quieres cancelar la subida?',
        dictCancelUpload: 'Cancelar subida',
        dictRemoveFileConfirmation: '¿Quieres eliminar este archivo?',
        dictInvalidFileType: 'No puedes subir archivos de este tipo',
        dictUploadCanceled: 'Subida cancelada',
        dictFileTooBig: 'El archivo es demasiado grande ',
        dictFallbackMessage: 'Cancelar subida',
        dictMaxFilesExceeded: 'Solo puedes subir una imagen',
        dict: 'Error al subir el archivo',
        dictFallbackText: 'Error al subir el archivo',
        init: function () {
            if (document.querySelector('[name=imagen]').value.trim()) {
                const imagenPublicada = {
                    size: 12345,
                    name: document.querySelector('[name=imagen]').value,
                }
                this.options.addedfile.call(this, imagenPublicada);
                this.options.thumbnail.call(this, imagenPublicada, `/uploads/${imagenPublicada.name}`);

                imagenPublicada.previewElement.classList.add('dz-success', 'dz-complete');
            }
        }
    })

    dropzone.on('success', function (file, response) {
        document.querySelector('[name=imagen]').value = response['imagen'];
    })

    dropzone.on('removedfile', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch(`/imagenes/${document.querySelector('[name=imagen]').value}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
            }
        }).then(() => document.querySelector('[name=imagen]').value = "")
            .catch(() => console.log('Error al eliminar la imagen'))
    })
}

