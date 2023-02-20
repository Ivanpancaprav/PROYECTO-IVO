import { Component, OnInit, Inject } from '@angular/core';

import { ActivatedRoute } from '@angular/router';



@Component({
  selector: 'app-crear-historial',
  templateUrl: './crear-historial.component.html',
  styleUrls: ['./crear-historial.component.css']
})
export class CrearHistorialComponent {

    // public empleado: Empleado;
    // public mensajeErr = "";
    // public introducido = -1;
    // formularioAlta = new FormGroup({
    //   nombre: new FormControl('', [Validators.required, Validators.minLength(3), Validators.maxLength(50)]),
    //   edad: new FormControl('', [Validators.required, Validators.min(1), Validators.max(119)]),
    //   cargo: new FormControl('', [Validators.required, Validators.maxLength(20)]),
    //   contratado: new FormControl('', [Validators.required])
    // });
    // public cargando = false;
  
    // constructor(private usuarios_service:UsuariosServiceService, private router: Router, private toastr: ToastrService) {
    //   this.empleado = new Empleado("", 0, "", 0);
    // }
  
    // ngOnInit(): void {
  
    // }
  
    // onSubmit() {
    //   if (this.formularioAlta.valid) {
    //     this.empleado.nombre = this.formularioAlta.value.nombre!;
    //     this.empleado.edad = Number(this.formularioAlta.value.edad);
    //     this.empleado.cargo = this.formularioAlta.value.cargo!;
    //     // this.empleado.contratado = Number(this.formularioAlta.value.contratado);
    //     this.empleado.contratado = this.formularioAlta.value.contratado ? 1 : 0;
    //     this.cargando = true;
    //     this._empleadosService.introducirEmpleado(this.empleado)
    //       .subscribe(
    //         result => {
    //           this.introducido = 1;
    //           this.cargando = false;
    //           // this.router.navigate(['/empleados']);
    //           // this.toastr.success('El empleado se ha registrado con éxito!!', 'Añadido empleado');
    //           this.toastr.success('El empleado se ha registrado con éxito!!', 'Añadido empleado', { positionClass: 'toast-bottom-right', timeOut: 2000 });
    //           setTimeout(() => {
    //             this.router.navigate(['/empleados']);
    //           }, 50);
    //           // console.log("Empleado registrado con éxito");
    //           // this.getEmpleados();
    //         },
    //         error => {
    //           this.introducido = 0;
    //           this.cargando = false;
    //           this.mensajeErr = '';
    //           if (error instanceof ErrorEvent) {
    //             this.mensajeErr = error.error.message;
    //           }
    //           else if (error.status == 409) {
    //             this.mensajeErr = "Empleado ya existe"
    //           } else {
    //             this.mensajeErr = "Error status:" + error.status;
    //           }
    //           // console.log(this.mensajeErr);
    //           this.toastr.error(this.mensajeErr, 'ERROR AÑADIENDO EMPLEADO', { positionClass: 'toast-bottom-right' });
    //         }
    //       );
    //   } else this.toastr.error("El formulario no valida bien", 'ERROR AÑADIENDO EMPLEADO', { positionClass: 'toast-bottom-right' });
    // }
  
  }
  
  
