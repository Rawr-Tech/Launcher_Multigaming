namespace LauncherArma3
{
    partial class languageChoice
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(languageChoice));
            this.englishFlag = new System.Windows.Forms.PictureBox();
            this.frenchFlag = new System.Windows.Forms.PictureBox();
            this.animation = new System.ComponentModel.BackgroundWorker();
            ((System.ComponentModel.ISupportInitialize)(this.englishFlag)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.frenchFlag)).BeginInit();
            this.SuspendLayout();
            // 
            // englishFlag
            // 
            this.englishFlag.Cursor = System.Windows.Forms.Cursors.Hand;
            this.englishFlag.Image = ((System.Drawing.Image)(resources.GetObject("englishFlag.Image")));
            this.englishFlag.Location = new System.Drawing.Point(397, 142);
            this.englishFlag.Name = "englishFlag";
            this.englishFlag.Size = new System.Drawing.Size(222, 157);
            this.englishFlag.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.englishFlag.TabIndex = 9;
            this.englishFlag.TabStop = false;
            this.englishFlag.Click += new System.EventHandler(this.englishFlag_Click);
            this.englishFlag.MouseEnter += new System.EventHandler(this.setEnglish);
            // 
            // frenchFlag
            // 
            this.frenchFlag.Cursor = System.Windows.Forms.Cursors.Hand;
            this.frenchFlag.Image = ((System.Drawing.Image)(resources.GetObject("frenchFlag.Image")));
            this.frenchFlag.Location = new System.Drawing.Point(61, 142);
            this.frenchFlag.Name = "frenchFlag";
            this.frenchFlag.Size = new System.Drawing.Size(222, 157);
            this.frenchFlag.SizeMode = System.Windows.Forms.PictureBoxSizeMode.StretchImage;
            this.frenchFlag.TabIndex = 7;
            this.frenchFlag.TabStop = false;
            this.frenchFlag.Click += new System.EventHandler(this.frenchFlag_Click);
            this.frenchFlag.MouseEnter += new System.EventHandler(this.setFrench);
            // 
            // animation
            // 
            this.animation.DoWork += new System.ComponentModel.DoWorkEventHandler(this.animation_DoWork);
            this.animation.RunWorkerCompleted += new System.ComponentModel.RunWorkerCompletedEventHandler(this.refresh);
            // 
            // languageChoice
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(687, 399);
            this.Controls.Add(this.englishFlag);
            this.Controls.Add(this.frenchFlag);
            this.Cursor = System.Windows.Forms.Cursors.IBeam;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MaximizeBox = false;
            this.Name = "languageChoice";
            this.Resizable = false;
            this.Style = MetroFramework.MetroColorStyle.Silver;
            this.Text = "Select your language";
            this.TextAlign = MetroFramework.Forms.MetroFormTextAlign.Center;
            this.Theme = MetroFramework.MetroThemeStyle.Dark;
            this.FormClosed += new System.Windows.Forms.FormClosedEventHandler(this.close);
            this.Load += new System.EventHandler(this.languageChoice_Load);
            ((System.ComponentModel.ISupportInitialize)(this.englishFlag)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.frenchFlag)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion
        private System.Windows.Forms.PictureBox englishFlag;
        private System.Windows.Forms.PictureBox frenchFlag;
        private System.ComponentModel.BackgroundWorker animation;
    }
}