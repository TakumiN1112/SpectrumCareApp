import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

import { HomePage } from '../home/home';

/**
 * Generated class for the SopPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-sop',
  templateUrl: 'sop.html',
})
export class SopPage {

  constructor(public navCtrl: NavController, public navParams: NavParams) {
  }
  goHome(){
	this.navCtrl.push(HomePage)
  }

  ionViewDidLoad() {
    console.log('ionViewDidLoad SopPage');
  }

}
