import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl,AbstractControl,Validators,FormArray,ValidatorFn,ValidationErrors } from '@angular/forms';

@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.scss']
})
export class FormularioComponent implements OnInit {
  public form: FormGroup = new FormGroup({
    idusuario:new FormControl(0),
    usuario:new FormControl(""),
    contrasena:new FormControl(""),
  });
  constructor() { }

  ngOnInit(): void {
  }

}
