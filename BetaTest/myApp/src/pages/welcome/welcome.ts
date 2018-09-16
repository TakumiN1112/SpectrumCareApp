import { Component } from '@angular/core';
import { IonicPage, NavController, NavParams } from 'ionic-angular';

import { HomePage } from '../home/home';

/**
 * Generated class for the EventPage page.
 *
 * See https://ionicframework.com/docs/components/#navigation for more info on
 * Ionic pages and navigation.
 */

@IonicPage()
@Component({
  selector: 'page-welcome',
  templateUrl: 'welcome.html',
})
export class WelcomePage {
	htmlUrl:any;
  constructor(public navCtrl: NavController, public navParams: NavParams) {
	  this.htmlUrl="http://www.rndmyspectrum.com/welcome.html";
  }
  goHome(){
	this.navCtrl.push(HomePage)
  }
  ionViewDidLoad() {
    console.log('ionViewDidLoad WelcomePage');
  }

}
